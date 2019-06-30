<?php

use Faker\Generator as Faker;

$factory->define(\App\AnimalsDb::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\UsersDbs::class)->create()->id,
        'name' => $faker->firstName,
        'date_of_birth' => $faker->date(),
        'description' => $faker->paragraph,
        'availability' => 'yes',
        'created_at' => $faker->dateTime($max = 'now'),
        'updated_at' => $faker->dateTime($max = 'now'),
    ];
});
