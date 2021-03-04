<?php

use Faker\Generator as Faker;

$factory->define(App\ExamenAnalysis::class, function (Faker $faker) {
    return [
        'code' => '45874',
        'descripcion' => $faker->text(20),
        'resultado' => $faker->text(20),
        'tipo_dato' => $faker->text(6),
        'valor' => '',
        'unidad' => $faker->text(6),
        'referencia' => $faker->sentence,
        'metodo' => $faker->text(10),
        'validado' => 'Si',
        'aprobado' => 'Si',
        'motivo' => '',
    ];
});
