<?php

use Faker\Generator as Faker;

$factory->define(\App\RequestsDbs::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\UsersDbs::class)->create()->id,
        'animal_id' => factory(App\AnimalsDb::class)->create()->id,
        'status' => 'Pending',
        'created_at' => $faker->dateTime($max = 'now'),
        'updated_at' => $faker->dateTime($max = 'now'),
    ];
});
