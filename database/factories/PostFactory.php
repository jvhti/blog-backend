<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $userCount = \DB::table('users')->count();
    return [
        'permalink' => $faker->unique()->slug,
        'title' => $faker->sentence,
        'body' => $faker->text,
        'createdBy' => rand(1, $userCount),
        'updatedBy' => (rand(1, 5) < 2) ? null : rand(1, $userCount),
        'type' => rand(0, 5),
        'published' => rand(0, 100) < 90,
        'visible' => rand(0, 100) < 75,
        'publishDate' => $faker->dateTime,
        'coverImg' => null,
        'backgroundColor' => $faker->hexcolor,
    ];
});
