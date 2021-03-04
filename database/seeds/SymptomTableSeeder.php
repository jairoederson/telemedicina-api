<?php

use Illuminate\Database\Seeder;

class SymptomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('symptom')->insert(array(
        	array('name' => 'Dolor de cabeza',
            	'description' => '...',
            	'estado' => 1,
            	'diseas_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

        	array('name' => 'Nauseas',
            	'description' => '...',
            	'estado' => 1,
            	'diseas_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

        	array('name' => 'Vomito',
            	'description' => '...',
            	'estado' => 1,
            	'diseas_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

        	array('name' => 'Aturdimiento',
            	'description' => '...',
            	'estado' => 1,
            	'diseas_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

        	array('name' => 'Inflamación',
            	'description' => '...',
            	'estado' => 1,
            	'diseas_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

        	array('name' => 'Hematoma',
            	'description' => '...',
            	'estado' => 1,
            	'diseas_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

        	array('name' => 'Esguince',
            	'description' => '...',
            	'estado' => 1,
            	'diseas_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

        ));
    }
}
