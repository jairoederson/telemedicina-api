<?php

use Illuminate\Database\Seeder;

class TypeCardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('type_card')->insert(array(
        	array('name' => 'Visa',
            	'description' => 'tarjeta visa',
            	'img' => "https://www.alo.doctor/images/card/visa.png",
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),

        	array('name' => 'MasterCard',
            	'description' => 'tarjeta mastercard',
            	'img' => "https://www.alo.doctor/images/card/mastercard.png",
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),

        	array('name' => 'American Express',
            	'description' => 'tarjeta american express',
            	'img' => "https://www.alo.doctor/images/card/americans.png",
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),

        	array('name' => 'Diners Club',
            	'description' => 'tarjeta dinners club',
            	'img' => "https://www.alo.doctor/images/card/dinners.png",
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),

          array('name' => 'Discover',
            	'description' => 'tarjeta discover',
            	'img' => "https://www.alo.doctor/images/card/discover.png",
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),

          array('name' => 'JCB',
            	'description' => 'tarjeta jcb',
            	'img' => "https://www.alo.doctor/images/card/JCB.png",
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),

          array('name' => 'Union Pay',
            	'description' => 'tarjeta union pay',
            	'img' => "https://www.alo.doctor/images/card/union_pay.png",
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),

        ));
    }
}
