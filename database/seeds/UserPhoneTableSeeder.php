<?php

use Illuminate\Database\Seeder;

class UserPhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_phones')->insert(array(
            array('code'     => '+51',
                'number'         => '997182806',
                'description'    => '...',
                'type_phones_id' => 2,
                'users_id'       => 2,
                'estado'         => 1,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s")),

            array('code'     => '+51',
                'number'         => '997182524',
                'description'    => '...',
                'type_phones_id' => 2,
                'users_id'       => 2,
                'estado'         => 1,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s")),
        ));
    }
}
