<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nombre' => $faker->firstName,
        'apellido_paterno' => $faker->lastName,
        'apellido_materno' => $faker->lastName,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->email,
        'password' => $password ?: $password = bcrypt('secret'),
        'estado' => $faker->boolean,
        'role' => $faker->randomElement(['almacenista', 'admin']),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Cliente::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->name,
        'edad' => $faker->numberBetween(18, 50),
        'sexo' => $faker->boolean,
        'empresa' => $faker->company,
        'email' => $faker->unique()->email,
        'estado' => $faker->boolean,
    ];
});

$factory->define(App\Producto::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->word,
        'categoria' => $faker->word,
        'existencia' => $faker->numberBetween(0, 500),
        'estado' => $faker->boolean,
    ];
});
