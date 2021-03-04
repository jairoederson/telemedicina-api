<?php

use Illuminate\Database\Seeder;

class SocialProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_providers')->insert(array(
        	array('name' => 'GOOGLE',
            	'description' => 'Autenticacion por Google',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
        	array('name' => 'FACEBOOK',
            	'description' => 'Autenticacion por Facebook',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"))
        ));
    }
}
