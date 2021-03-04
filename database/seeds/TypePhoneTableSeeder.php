<?php

use Illuminate\Database\Seeder;

class TypePhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_phones')->insert(array(
            array('name'  => 'Movil',
                'description' => 'Teléfonos Celulares',
                'estado'      => 1,
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s")),

            array('name'  => 'Casa',
                'description' => 'Teléfonos de casa',
                'estado'      => 1,
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s")),
        ));
    }
}
