<?php

use Faker\Generator as Faker;

$factory->define(App\Report::class, function (Faker $faker) {
    $userCount = \DB::table('users')->count();

    return [
      'ipAddress' => $faker->ipv4,
      'createdBy' => rand(1, $userCount),
      'confirmed' => rand(0, 100) > 95,
      'trustFactor' => mt_rand() / mt_getrandmax()
    ];
});

$factory->state(App\Report::class, 'reviewed', function ($faker) {
    $userCount = \DB::table('users')->count();

    return [
      'reviewedBy' => rand(1, $userCount),
      'reviewerResponse' => $faker->text,
      'reviewerAction' => array_rand(['ignore', 'edit', 'remove', 'ban', 'ip_ban', 'ban_reporter', 'other'])
    ];
});
