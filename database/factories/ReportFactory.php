<?php

use Faker\Generator as Faker;

$factory->define(App\Report::class, function (Faker $faker) {
    $userCount = \DB::table('users')->count();
    $reviewed = Array();
    
    if(rand(0, 10) == 10)
      $reviewed = [
        'reviewedBy' => rand(1, $userCount),
        'reviewerResponse' => $faker->text,
        'reviewerAction' => array_rand(['ignore', 'edit', 'remove', 'ban', 'ip_ban', 'ban_reporter', 'other']),
      ];

    return array_merge([
      'ipAddress' => $faker->ipv4,
      'createdBy' => rand(1, $userCount),
      'confirmed' => rand(0, 100) > 95
    ], $reviewed);
});
