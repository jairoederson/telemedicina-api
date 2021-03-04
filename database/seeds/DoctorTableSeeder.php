<?php

use Illuminate\Database\Seeder;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert(array(
            array('specialty_id' => 1,
            	'id_cmp' => "45664789989788",
            	'qualification' => 0,
            	'linkedIn' => "",
            	'about_me' => "El Dr Ruben es especialista en Medicina General",
            	'users_id' => 3,
              'status' => 1,
              'specialty' => "Medicina General",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

            array('specialty_id' => 1,
                'id_cmp' => "45664789989788",
                'qualification' => 3,
                'linkedIn' => "",
                'about_me' => "El Dr Cristobal es especialista en Medicina General",
                'users_id' => 4,
                'status' => 1,
                'specialty' => "Medicina General",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

            array('specialty_id' => 9,
                'id_cmp' => "45664789989788",
                'qualification' => 3,
                'linkedIn' => "",
                'about_me' => "El Dr Juan es especialista en Neurología",
                'users_id' => 5,
                'status' => 1,
                'specialty' => "Neurología",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),


            array('specialty_id' => 9,
                'id_cmp' => "45664789989788",
                'qualification' => 4,
                'linkedIn' => "",
                'about_me' => "El Dr Luis es especialista en Neurología",
                'users_id' => 6,
                'status' => 1,
                'specialty' => "Neurología",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

            array('specialty_id' => 15,
                'id_cmp' => "45664789989788",
                'qualification' => 3,
                'linkedIn' => "",
                'about_me' => "El Dr Miguel es especialista en Traumatología ",
                'users_id' => 7,
                'status' => 1,
                'specialty' => "Traumatología",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

            array('specialty_id' => 15,
                'id_cmp' => "45664789989788",
                'qualification' => 3,
                'linkedIn' => "",
                'about_me' => "El Dr Muller es especialista en Traumatología",
                'users_id' => 8,
                'status' => 1,
                'specialty' => "Traumatología",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"))

    	));
    }
}
