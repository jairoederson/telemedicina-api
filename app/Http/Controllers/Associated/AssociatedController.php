<?php

namespace App\Http\Controllers\Associated;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Company;
use App\User;
use App\Query;
use App\RoleUser;
use App\Activation;
use App\AffiliatePatient;
use Mail;
use App\Mail\Restore;

class AssociatedController extends Controller
{
    /**
     *
     * Obtener asociados
     *
     * @param    var $user_id
     * @return      boolean
     *
     */
    public function getAffiliatesAssociated($user_id)
    {
        $patient = Patient::where('users_id', $user_id)->get();

        if (count($patient) == 0) {
            return response()->json([
                'message' => 'No se encontro al paciente',
                'code' => 404,
            ]);
        }

        $affiliatePatient = AffiliatePatient::where(
            'affiliate_id',
            $patient[0]->id
        )->get();

        if (count($affiliatePatient) == 0) {
            return response()->json([
                'message' => 'El paciente no es un afiliado',
                'code' => 201,
            ]);
        }

        $data = [];
        if ($affiliatePatient[0]->isResponsible == 1) {
            $affiliatePatient = AffiliatePatient::where(
                'company_id',
                $affiliatePatient[0]->company_id
            )->get();

            foreach ($affiliatePatient as $key => $affiliate) {
                if ($affiliate->isResponsible == 0) {
                    $patient_affiliate = Patient::findOrFail(
                        $affiliate->affiliate_id
                    );

                    $user = \DB::table('users')
                        ->where('users.id', $patient_affiliate->users_id)
                        ->get();

                    $queries = Query::where(
                        'patient_id',
                        $affiliate->affiliate_id
                    )->get();
                    $last_query = 'No existe';

                    if (count($queries) != 0) {
                        $last_query = end($queries)[0]->created_at;
                    }

                    $result = [
                        'numdoc' => $user[0]->numdoc,
                        'name' => $user[0]->name . ' ' . $user[0]->last_name,
                        'ocupation' => $patient_affiliate->ocupation,
                        'total_calls' => count($queries),
                        'last_query' => $last_query,
                    ];

                    array_push($data, $result);
                }
            }
        } else {
            return response()->json([
                'message' => 'El usuario no es un responsable de la empresea',
                'code' => 201,
            ]);
        }

        return response()->json([
            'message' => 'Afiliados encontrados',
            'code' => 200,
            'data' => $data,
        ]);
    }

    /**
     *
     * Verificar si es un afiliado de una empresa
     *
     * @param    var $user_id
     * @return      boolean
     *
     */
    public function isAffiliated($id)
    {
        $patient = Patient::where('users_id', $id)->get();

        if (count($patient) == 0) {
            return response()->json([
                'message' => 'El usuario no se un paciente',
                'code' => 404,
            ]);
        }

        $affiliatePatient = AffiliatePatient::where(
            'affiliate_id',
            $patient[0]->id
        )->get();

        if (count($affiliatePatient) == 0) {
            return response()->json([
                'message' => 'El usuario no es un afiliado',
                'code' => 404,
                'isAffiliated' => false,
            ]);
        }

        return response()->json([
            'message' => 'El usuario es un afiliado',
            'code' => 200,
            'isAffiliated' => true,
        ]);
    }

    /**
     *
     * Verificar si es el responsable de una compañia
     *
     * @param    var $user_id
     * @return      boolean
     *
     */
    public function isResponsibleForCompany($id)
    {
        $patient = Patient::where('users_id', $id)->get();

        if (count($patient) == 0) {
            return response()->json([
                'message' => 'El usuario no se un paciente',
                'code' => 404,
            ]);
        }

        $affiliatePatient = AffiliatePatient::where(
            'affiliate_id',
            $patient[0]->id
        )->get();

        if (count($affiliatePatient) == 0) {
            return response()->json([
                'message' => 'El usuario no es un afiliado',
                'code' => 404,
                'isAffiliated' => false,
            ]);
        }

        if ($affiliatePatient[0]->isResponsible == 1) {
            return response()->json([
                'message' =>
                    'El usuario es un afiliado que esta a cargo de la empresa',
                'code' => 200,
                'isAffiliated' => true,
                'isResponsible' => true,
            ]);
        } else {
            return response()->json([
                'message' =>
                    'El usuario es un afiliado, pero no esta a cargo de la empresa',
                'code' => 200,
                'isAffiliated' => true,
                'isResponsible' => false,
            ]);
        }
    }

    /**
     *
     * Registrar nuevo afiliado
     *
     * @param    var $user_id
     * @return      json
     *
     */
    public function saveNewAffiliated(Request $request)
    {
        $user_to_create = User::where('email', $request->get('email'))->get();

        if (count($user_to_create) > 0) {
            return response()->json([
                'message' => 'El usuario con este Correo electronico ya existe',
                'code' => 206,
            ]);
        }

        $fields_user = [
            'email' => $request->get('email'),
            'password' => \Hash::make($request->get('password')),
            'name' => $request->get('name'),
            'last_name' => $request->get('last_name'),
            'gender' => $request->get('gender'),
            'type_document_id' => $request->get('type_document_id'),
            'numdoc' => $request->get('numdoc'),
            'tel' => $request->get('tel'),
            'birth_date' => $request->get('birth_date'),
        ];

        $user_to_save = User::create($fields_user);

        $fields_role = [
            'user_id' => $user_to_save->id,
            'role_id' => 3,
        ];

        $role_user = RoleUser::create($fields_role);

        $fields_patient = [
            'users_id' => $user_to_save->id,
        ];

        $activate = [
            'user_id' => $user_to_save->id,
            'code' => \Hash::make('code'),
            'completed' => 1,
            'completed_at' => date('d/m/y H:i a'),
        ];

        $activation = Activation::create($activate);

        $patient_to_save = Patient::create($fields_patient);

        $user_id = $request->get('user_id');
        $affiliate_responsible = Patient::where('users_id', $user_id)->get();

        $affiliatePatient = AffiliatePatient::where(
            'affiliate_id',
            $affiliate_responsible[0]->id
        )->get();

        $fields_affiliate_patient = [
            'affiliate_id' => $patient_to_save->id,
            'company_id' => $affiliatePatient[0]->company_id,
            'isResponsible' => 0,
        ];

        AffiliatePatient::create($fields_affiliate_patient);

        $data['user_name'] =
            $request->get('name') . ' ' . $request->get('last_name');
        $data['user_email'] = $request->get('email');
        $data['user_password'] = $request->get('password');
        // $data->activationUrl = URL::route('activate', [$user->id,$activation->code]);
        $data['activationUrl'] = 'http://localhost:8000/login';

        Mail::to($request->get('email'))->send(new Restore($data));

        return response()->json([
            'message' => 'Nuevo Afiliado registrado',
            'code' => 200,
        ]);
    }

    /**
     *
     * Registrar nuevo afiliado de forma masiva
     *
     * @param    var $user_id
     * @return      json
     *
     */
    public function saveNewAffiliatedGroup(Request $request)
    {
        $employees = $request->get('employees');

        foreach ($employees as $key => $employee) {
            $user_to_create = User::where('email', $employee['correo'])->get();

            if (count($user_to_create) > 0) {
                return response()->json([
                    'message' =>
                        'Algun usuario esta volviendo a registrarse con el mismo correo electrónico',
                    'code' => 206,
                    'status' => false,
                ]);
            }

            $gender = 1;

            if ($employee['genero'] == 'femenino') {
                $gender = 2;
            }

            $fields_user = [
                'email' => $employee['correo'],
                'password' => \Hash::make($employee['contrasenia']),
                'name' => $employee['nombres'],
                'last_name' => $employee['apellidos'],
                'gender' => $gender,
                'type_document_id' => $employee['tipo_documento'],
                'numdoc' => $employee['numero_documento'],
                'tel' => $employee['celular'],
                'birth_date' => $employee['fecha_nacimiento'],
            ];

            $user_to_save = User::create($fields_user);

            $fields_role = [
                'user_id' => $user_to_save->id,
                'role_id' => 3,
            ];

            $role_user = RoleUser::create($fields_role);

            $fields_patient = [
                'users_id' => $user_to_save->id,
            ];

            $activate = [
                'user_id' => $user_to_save->id,
                'code' => \Hash::make('code'),
                'completed' => 1,
                'completed_at' => date('d/m/y H:i a'),
            ];

            $activation = Activation::create($activate);

            $patient_to_save = Patient::create($fields_patient);

            $user_id = $request->get('user_id');
            $affiliate_responsible = Patient::where(
                'users_id',
                $user_id
            )->get();

            $affiliatePatient = AffiliatePatient::where(
                'affiliate_id',
                $affiliate_responsible[0]->id
            )->get();

            $fields_affiliate_patient = [
                'affiliate_id' => $patient_to_save->id,
                'company_id' => $affiliatePatient[0]->company_id,
                'isResponsible' => 0,
            ];

            AffiliatePatient::create($fields_affiliate_patient);

            $data['user_name'] =
                $employee['nombres'] . ' ' . $employee['apellidos'];
            $data['user_email'] = $employee['correo'];
            $data['user_password'] = $employee['contrasenia'];
            // // $data->activationUrl = URL::route('activate', [$user->id,$activation->code]);
            $data['activationUrl'] = 'http://localhost:8000/login';

            Mail::to($employee['correo'])->send(new Restore($data));
        }

        return response()->json([
            'message' => 'Registro de empledos exitoso',
            'code' => 200,
        ]);
    }
}
