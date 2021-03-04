<?php
namespace App\Mifarma\Repositories;

use App\Mifarma\Entities\User;

class UserRepo extends BaseRepo
{
    public function getModel()
    {
        return new User();
    }
    public function findUserEmail($email)
    {
        //return $email;
        $user = User::select(
            'users.*',
            'role_users.role_id',
            'roles.slug',
            'roles.name as name_role',
            'patients.id as  patient_id',
            'patients.ocupation',
            'patients.num_attentions',
            'doctors.id as doctor_id',
            //'doctors.specialty',
            'doctors.id_cmp',
            'doctors.qualification',
            'doctors.linkedIn',
            'doctors.about_me',
            'specialties.id as specialty_id',
            'specialties.name as specialty',
            'specialties.description as description_specialty'
        )
            ->where('email', $email)
            ->join('role_users', function ($join) {
                $join->on('users.id', '=', 'role_users.user_id');
            })
            ->join('roles', function ($join) {
                $join->on('roles.id', '=', 'role_users.role_id');
            })
            ->leftjoin('doctors', function ($join) {
                $join->on('doctors.users_id', '=', 'users.id');
            })
            ->leftjoin('patients', function ($join) {
                $join->on('patients.users_id', '=', 'users.id');
            })
            ->leftjoin('specialties', function ($join) {
                $join->on('specialties.id', '=', 'doctors.specialty_id');
            })

            ->get();
        return $user;
    }

    public function getUserId($user_id)
    {
        $user = User::select(
            'users.*',
            'role_users.role_id',
            'roles.slug',
            'roles.name as name_role',
            'patients.id as  patient_id',
            'patients.ocupation',
            'patients.num_attentions',
            'patients.weight',
            'patients.size',
            'doctors.id as  doctor_id',
            //'doctors.specialty',
            'doctors.id_cmp',
            'doctors.qualification',
            'doctors.linkedIn',
            'doctors.about_me',
            //     'doctors.firma_digital',
            'specialties.id as specialty_id',
            'specialties.name as specialty',
            'specialties.description as description_specialty'
        )
            ->where('users.id', $user_id)
            ->join('role_users', function ($join) {
                $join->on('users.id', '=', 'role_users.user_id');
            })
            ->join('roles', function ($join) {
                $join->on('roles.id', '=', 'role_users.role_id');
            })
            ->leftjoin('doctors', function ($join) {
                $join->on('doctors.users_id', '=', 'users.id');
            })
            ->leftjoin('patients', function ($join) {
                $join->on('patients.users_id', '=', 'users.id');
            })
            ->leftjoin('specialties', function ($join) {
                $join->on('specialties.id', '=', 'doctors.specialty_id');
            })

            ->get();

        return $user;
    }

    public function findUserIdEmail($email)
    {
        $user = User::select('users.id')
            ->where('email', $email)
            ->first();
        return $user;
    }

    public function getDoctors($speciality_id)
    {
        if ($speciality_id != 1) {
            $user = User::select(
                'users.*',
                'role_users.role_id',
                'roles.slug',
                'roles.name as name_role',
                'doctors.id as  doctor_id',
                'doctors.specialty_id',
                'doctors.id_cmp',
                'doctors.qualification',
                'doctors.linkedIn',
                'doctors.status',
                'doctors.about_me',
                'specialties.id as specialty_id',
                'specialties.name as specialty',
                'specialties.description as description_specialty'
            )
                ->where('users.estado', 1)
                ->join('role_users', function ($join) {
                    $join->on('users.id', '=', 'role_users.user_id');
                })
                ->join('roles', function ($join) {
                    $join
                        ->on('roles.id', '=', 'role_users.role_id')
                        ->where('roles.id', '=', 2);
                })
                ->join('doctors', function ($join) {
                    $join->on('doctors.users_id', '=', 'users.id');
                })
                ->join('specialties', function ($join) {
                    $join->on('specialties.id', '=', 'doctors.specialty_id');
                })
                ->where('doctors.specialty_id', '=', $speciality_id)
                ->where('doctors.status', '=', 1)
                ->orderBy('qualification', 'desc')

                ->get();
        }

        $user1 = User::select(
            'users.*',
            'role_users.role_id',
            'roles.slug',
            'roles.name as name_role',
            'doctors.id as  doctor_id',
            'doctors.specialty_id',
            'doctors.id_cmp',
            'doctors.qualification',
            'doctors.linkedIn',
            'doctors.about_me',
            'doctors.status',
            'specialties.id as specialty_id',
            'specialties.name as specialty',
            'specialties.description as description_specialty'
        )
            ->where('users.estado', 1)
            ->join('role_users', function ($join) {
                $join->on('users.id', '=', 'role_users.user_id');
            })
            ->join('roles', function ($join) {
                $join
                    ->on('roles.id', '=', 'role_users.role_id')
                    ->where('roles.id', '=', 2);
            })
            ->join('doctors', function ($join) {
                $join->on('doctors.users_id', '=', 'users.id');
            })
            ->join('specialties', function ($join) {
                $join->on('specialties.id', '=', 'doctors.specialty_id');
            })
            ->where('doctors.specialty_id', '=', 1)
            ->where('doctors.status', '=', 1)
            ->orderBy('qualification', 'desc')
            ->get();

        $contador = 0;
        $array = [];
        if ($speciality_id != 1) {
            foreach ($user as $obj) {
                $array[$contador] = $obj;
                $contador++;
            }
        }

        foreach ($user1 as $obj) {
            $array[$contador] = $obj;
            $contador++;
        }

        foreach ($array as $key => $value) {
            if ($value->gender == '1') {
                $value->genero = 'Hombre';
            } elseif ($value->gender == '2') {
                $value->genero = 'Mujer';
            }

            $config = \DB::table('configs')
                ->where('configs.id', 1)
                ->get();

            $value->price = $config[0]->price;
            $value->years_old = $this->getAge($value->birth_date);
            $last_name_arr = explode(' ', $value->last_name);
            $value->last_name = $last_name_arr[0];
            // $value->last_name = substr($value->last_name,0,1).".";
        }

        return $array;
    }

    public function getAge($date)
    {
        return intval(date('Y', time() - strtotime($date))) - 1970;
    }

    public function findUserUserSocialProvider(
        $social_provider_id,
        $id_provider
    ) {
        //return $email;
        $user = User::select(
            'users.*',
            'role_users.role_id',
            'roles.slug',
            'roles.name as name_role',
            'patients.id as  patient_id',
            'patients.ocupation',
            'patients.num_attentions',
            'doctors.id as  doctor_id',
            //'doctors.specialty',
            'doctors.id_cmp',
            'doctors.qualification',
            'doctors.linkedIn',
            'doctors.about_me',
            'specialties.id as specialty_id',
            'specialties.name as specialty',
            'specialties.description as description_specialty'
        )

            ->join('det_users_social_providers', function ($join) {
                $join->on(
                    'users.id',
                    '=',
                    'det_users_social_providers.users_id'
                );
            })
            ->join('role_users', function ($join) {
                $join->on('users.id', '=', 'role_users.user_id');
            })
            ->join('roles', function ($join) {
                $join->on('roles.id', '=', 'role_users.role_id');
            })
            ->leftjoin('doctors', function ($join) {
                $join->on('doctors.users_id', '=', 'users.id');
            })
            ->leftjoin('patients', function ($join) {
                $join->on('patients.users_id', '=', 'users.id');
            })
            ->leftjoin('specialties', function ($join) {
                $join->on('specialties.id', '=', 'doctors.specialty_id');
            })
            ->where(
                'det_users_social_providers.social_provider_id',
                $social_provider_id
            )
            ->where('det_users_social_providers.id_provider', $id_provider)

            ->get();
        return $user;
    }
}
