<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    $userCount = \DB::table('users')->count();
    $postCount = \DB::table('posts')->count();
    
    return [
      'comment' => $faker->text,
      'createdBy' => rand(1, $userCount),
      'visible' => rand(0, 10) < 9,
      'postID' => rand(1, $postCount),
      'ipAddress' => $faker->ipv4,
      'removed' => rand(0,10) != 10,
      'removedCause' => $faker->sentence
    ];
});
