<?php

use Illuminate\Database\Seeder;

class DiseasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diseases')->insert(array(
        	array('name' => 'Conmoción cerebral',
            	'description' => 'La conmoción cerebral es una lesión del cerebro bastante frecuente. Se produce, sobre todo, durante la práctica de deporte o en un accidente de tráfico. En el hogar esta lesión puede ocurrir por una caída o un leve traumatismo craneoencefálico. Por lo general, una conmoción cerebral se manifiesta mediante una pérdida de consciencia y una laguna de memoria temporal.',
            	'estado' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

        	array('name' => 'Esguince',
            	'description' => 'El esguince o torcedura es una de las lesiones deportivas más frecuentes. Se produce cuando se realiza un movimiento que daña las cápsulas y los ligamentos de una articulación.',
            	'estado' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

        ));
    }
}
