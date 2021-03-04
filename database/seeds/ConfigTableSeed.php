<?php

use Illuminate\Database\Seeder;

class ConfigTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('configs')->insert(array(
        	array(
            'email' => 'mifarma@email.com',
            'description' => 'Cadena de farmacias comercializadora de medicamentos y productos de higiene, de cuidado personal y de belleza.',
          	'price' => 5.00,
          	'estado' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
          ),

        ));
    }
}
