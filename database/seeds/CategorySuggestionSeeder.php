<?php

use Illuminate\Database\Seeder;

class CategorySuggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('category_suggestions')->insert(array(
      	array('category' => 'Información de un error',
          	'description' => 'categoria informativa',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

        array('category' => 'Solicitar una nueva función de la app',
          	'description' => 'categoria informativa',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

        array('category' => 'Contactar con atención al cliente',
          	'description' => 'categoria informativa',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),
      ));
    }
}
