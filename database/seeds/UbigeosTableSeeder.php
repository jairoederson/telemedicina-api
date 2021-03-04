<?php

use Illuminate\Database\Seeder;

class UbigeosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(base_path()."/database/seeds/jsondata/ubigeos.json");
        $data = json_decode($json);


        foreach ($data as $object) {
            \DB::table('ubigeos')->insert(array(
                'countries_id' => 1,
                'ubigeo'  => $object->ubigeo ,
                'departamento'        => $object->departamento ,
                'provincia'           => $object->provincia ,
                'distrito'            => $object->distrito ,
                'estado'              => 1  ,
                'usuario_created_id'  => 1  ,
                'terminal'            => "127.0.0.1" ,
            ));
        }
    }
}
