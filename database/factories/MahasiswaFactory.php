<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\BiodataMahasiswa::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'nim' => '',
        'address'=> $faker->address,
    ];
});
