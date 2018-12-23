<?php

use Faker\Generator as Faker;

$factory->define(App\Timer::class, function (Faker $faker) {
    return [
        'name'       => $faker->word,
        'user_id'    => factory(\App\User::class)->create()->id,
        'active'     => true,
        'created_at' => \Carbon\Carbon::now(),
    ];
});
