<?php

use Illuminate\Database\Seeder;

class AffiliateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('affiliate_patients')->insert(array(
        	array(
            'affiliate_id' => 4,
            'company_id' => 1,
          	'isResponsible' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
          ),

          array(
            'affiliate_id' => 5,
            'company_id' => 1,
          	'isResponsible' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
          ),

        ));
    }
}
