<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Province;
use Faker\Generator as Faker;

$factory->define(Province::class, function (Faker $faker) {
    return [
        'prov_name' => $faker->city,
        'image' => 'bower_components/review_travel/img_travel/place/4.png',
        'intro' => $faker->text,
    ];
});
