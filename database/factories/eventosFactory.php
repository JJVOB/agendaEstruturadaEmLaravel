<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\evento;
use Faker\Generator as Faker;

$factory->define(evento::class, function (Faker $faker) {
    return [
        'titulo' => $faker->text(10),
        'data_inicial' => $faker->dateTime('now',null),
        'data_final' => $faker->dateTime('now',null),
        'descricao' => $faker->text(20),
        'cliente' => $faker->name,
    ];
});
