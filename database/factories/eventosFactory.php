<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Evento;
use Faker\Generator as Faker;

$factory->define(Evento::class, function (Faker $faker) {
    return [
        'titulo' => $faker->text(10),
        'descricao' => $faker->text(20),
        'data_inicial' => $faker->dateTime('2023-08-25 08:37:17',null),
        'data_final' => $faker->dateTime('2038-04-25 08:37:17',null),
        'cliente' => $faker->name,
    ];
});
