<?php

use Illuminate\Database\Seeder;

class TypeDocumentTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('type_documents')->insert(array(
        	array('type_name' => 'DNI',
            	'description' => 'Documento nacional de identidad',
            	'estado' => 1,
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),

        	array('type_name' => 'Carnet de extranjería',
            	'description' => 'Carnet de extranjería',
            	'estado' => 1,
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),

        	array('type_name' => 'Registro Unico de contribuyente',
            	'description' => 'Registro Unico de contribuyente',
            	'estado' => 0,
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),

        	array('type_name' => 'Pasaporte',
            	'description' => 'Pasaporte',
            	'estado' => 0,
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),

        	array('type_name' => 'Partida de nacimiento-identidad',
            	'description' => 'Partida de nacimiento-identidad',
            	'estado' => 0,
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),

        ));
    }
}
