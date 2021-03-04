<?php

use Illuminate\Database\Seeder;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert(array(
            array(
              'ocupation' => 'Ing. Sistemas',
              'num_attentions' => 0,
              'weight' => 80,
            	'size' => 1.78,
            	'users_id' => 2,
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")
            ),
            array(
              'ocupation' => 'Ing. Civil',
            	'num_attentions' => 0,
              'weight' => 80,
            	'size' => 1.78,
            	'users_id' => 11,
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")
            ),
            array(
              'ocupation' => 'Ing. Electronica',
            	'num_attentions' => 0,
              'weight' => 80,
            	'size' => 1.78,
            	'users_id' => 12,
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")
            ),
            array(
              'ocupation' => 'Empresa',
            	'num_attentions' => 0,
              'weight' => 80,
            	'size' => 1.78,
            	'users_id' => 13,
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")
            ),
            array(
              'ocupation' => 'Afiliado',
            	'num_attentions' => 0,
              'weight' => 80,
            	'size' => 1.78,
            	'users_id' => 14,
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")
            ),
            array(
              'ocupation' => 'Tutor',
            	'num_attentions' => 0,
              'weight' => 80,
            	'size' => 1.78,
            	'users_id' => 15,
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")
            ),
            array(
              'ocupation' => 'Tutorado',
            	'num_attentions' => 0,
              'weight' => 80,
            	'size' => 1.78,
            	'users_id' => 16,
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")
            ),

    	));

    }

}
