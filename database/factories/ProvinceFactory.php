<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Province;
use Faker\Generator as Faker;

$factory->define(Province::class, function (Faker $faker) {
    return [
        'prov_name' => $faker->city,
        'intro' => $faker->text,
    ];
});
