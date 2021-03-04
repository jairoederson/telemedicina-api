<?php

use App\Role;
use Faker\Factory;
use App\User;
use App\Doctor;
use App\Patient;
use Illuminate\Database\Seeder;

class AdminSeeder extends DatabaseSeeder {

	public function run()
	{

		DB::table('users'); // Using truncate function so all info will be cleared when re-seeding.
		DB::table('roles')->truncate();
		DB::table('role_users')->truncate();
		DB::table('activations')->truncate();

		$admin = User::create(array(
			'email'       => 'admin@admin.com',
			'password'    => bcrypt("admin"),
			'name'  => 'John',
			'last_name'   => 'Doe',
			//'ape_materno'   => '',
			'numdoc'   => '41414141',
			'type_document_id'   => 1,
			'estado'   => 1,
			'birth_date'=>'1985-10-10',
			'gender'=>1,
		));

		$adminRole = Role::create([
			'name' => 'Admin',
			'slug' => 'admin',
			'permissions' => json_encode(array('admin' => 1))
		]);

        $DoctorRole = Role::create([
			'name'  => 'Doctor',
			'slug'  => 'doctor',
		]);
		$PacienteRole = Role::create([
			'name'  => 'Paciente',
			'slug'  => 'paciente',
		]);
		$secretariaRole = Role::create([
			'name'  => 'Secretaria',
			'slug'  => 'secretaria',
		]);
		$laboratorioRole = Role::create([
			'name'  => 'Laboratorio',
			'slug'  => 'laboratorio',
		]);


		$admin->roles()->attach($adminRole);

		$userPaciente = User::create(array(
			'email'       => 'paciente@email.com',
		 	'password'    => bcrypt("Paciente1."),
		 	'name'  => 'Felipe',
		 	'last_name'   => 'Santiago Benites',
		 	'tel'=>'+51985854541',
		 	'user_sinch'   => 'cristobal',
		 	'password_sinch'   => '123456',
		 	'numdoc'   => '42424242',
		 	'type_document_id'   => 1,
		 	'estado'   => 1,
		 	'birth_date'=>'1988-10-10',
		 	'gender'=>1,
		 	'address'=>'Av. Arequipa',
		 	'address_extra_info'=>'Nro. 452 mz A lt 24',
		 	'img'=>'https://www.alo.doctor/images/user/default/default.jpg',
		 	'country'=>'Lima - Perú'
		));
		$userPaciente->roles()->attach($PacienteRole);
		$patient = Patient::create(array(
			'ocupation' => 'Arquitecto',
			'num_attentions' => 2,
			'users_id' => $userPaciente->id,
			'degree_instruction_id' => 1,
			'civil_status_id' => 1,
			'work_center' => 'Urbanizacion arquitectos',
			'weight' => 70,
			'size' => 1.8,
			'allergies' => 'Arquitecto',
			
		));

		$userDoctor = User::create(array(
		 	'email'       => 'doctor@mifarma.com',
		 	'password'    => bcrypt("Doctor1."),
		 	'name'  => 'Ruben',
		 	'last_name'   => 'Soto Ayala',
		 	'tel'=>'+51985854541',
		 	'user_sinch'   => 'alexis',
		 	'password_sinch'   => '123456',
		 	'numdoc'   => '43434343',
		 	'type_document_id'   => 1,
		 	'estado'   => 1,
		 	'birth_date'=>'1986-10-10',
		 	'gender'=>1,
		 	'address'=>'Av. Arequipa',
		 	'address_extra_info'=>'Nro. 452 mz A lt 24',
		 	'img'=>'https://www.alo.doctor/images/user/default/default.jpg',
		 	'country'=>'Lima - Perú'
		));
		$userDoctor->roles()->attach($DoctorRole);
		$doctor = Doctor::create(array(
			'specialty' => 'Arquitecto',
			'id_cmp' => '54554545454',
			'qualification' => 3.5,
			'linkedin' => 'arquitecto@linkedin',
			'about_me' => 'profesional',
			'users_id' => $userDoctor->id,
			'status' => 1,
			'status_sinch' => 1,
		));
		
		$userSecretaria = User::create(array(
			'email'       => 'secretaria@mifarma.com',
			'password'    => bcrypt("Secretaria1."),
			'name'  => 'Claudia Campos',
			'last_name'   => 'Campos Olarte',
			'tel'=>'+51985854541',
			'numdoc'   => '49494949',
			'type_document_id'   => 1,
			'estado'   => 1,
			'birth_date'=>'1978-10-10',
			'gender'=>2,
			'address'=>'Av. Arequipa',
			'address_extra_info'=>'Nro. 452 mz A lt 24',
			'img'=>'https://www.alo.doctor/images/user/default/default.jpg',
			'country'=>'Lima - Perú'
		));

		$userSecretaria->roles()->attach($secretariaRole);


		$userLaboratorio = User::create(array(
			'email'       => 'laboratorio@mifarma.com',
			'password'    => bcrypt("Laboratorio1."),
			'name'  => 'Pedro Paul',
			'last_name'   => 'Sanchez',
			'tel'=>'+51985854541',
			'numdoc'   => '50505050',
			'type_document_id'   => 1,
			'estado'   => 1,
			'birth_date'=>'1985-10-10',
			'gender'=>1,
			'address'=>'Av. Arequipa',
			'address_extra_info'=>'Nro. 452 mz A lt 24',
			'img'=>'https://www.alo.doctor/images/user/default/default.jpg',
			'country'=>'Lima - Perú'
		));

		$userLaboratorio->roles()->attach($laboratorioRole);

		$this->command->info('Admin User created with username admin@admin.com and password admin');
	}

}
