<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    $userCount = \DB::table('users')->count();
    return [
        'permalink' => $faker->unique()->slug,
        'name' => $faker->sentence,
        'description' => $faker->text,
        'createdBy_user_id' => rand(1, $userCount),
        'visible' => rand(0, 100) < 90,
        'coverImg' => null,
        'backgroundColor' => ltrim($faker->hexcolor, '#'),
    ];
});
