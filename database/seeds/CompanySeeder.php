<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('companies')->insert(array(
        	array(
            'name'=>'Coorporacion Cedion',
    				'ruc'=>'28454141444',
    				'number_phone'=>425874,
            'number_workers'=>7,
            'ubigeo_id'=>1,
    				'address'=>'Av. aguirre valenzuela',
            'address_extra_info'=>'mz A lt 2',
            'location'=>'Peru',
            'industry'=>'Constructora',
    				'about'=>'Constructora',
            'estado'=>1,
    				'name_contact'=>'empresa',
    				'last_name_contact'=>'empresa',
    				'position_contact'=>'Representante',
    				'telephone_contact'=>'985748588',
    				'email_contact'=>'empresa@email.com',
            'url_image'=>'https://www.alo.doctor/images/user/default/default.jpg',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
          ),

        ));
    }
}
