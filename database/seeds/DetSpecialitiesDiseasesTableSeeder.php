<?php

use Illuminate\Database\Seeder;

class DetSpecialitiesDiseasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('det_specialties_diseases')->insert(array(
	        array('diseas_id' => 1,
	        	'specialty_id' => 15,
	            'created_at' => date("Y-m-d H:i:s"),
	            'updated_at' => date("Y-m-d H:i:s")),

	        array('diseas_id' => 1,
	        	'specialty_id' => 9,
	            'created_at' => date("Y-m-d H:i:s"),
	            'updated_at' => date("Y-m-d H:i:s")),

	        array('diseas_id' => 2,
	        	'specialty_id' => 15,
	            'created_at' => date("Y-m-d H:i:s"),
	            'updated_at' => date("Y-m-d H:i:s"))
	    ));
    }
}
