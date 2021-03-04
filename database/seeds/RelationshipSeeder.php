<?php

use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('relationships')->insert(array(
        	array(
            'tutor'=>6,
    				'tutored'=>7,
    				'relationship'=>'Hijo',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
          ),

        ));
    }
}
