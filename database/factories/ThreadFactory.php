<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(\App\Thread::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id' => function() {
            return factory(User::class)->create()->id;
        }
    ];
});
