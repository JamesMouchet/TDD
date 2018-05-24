<?php

use Faker\Generator as Faker;

$factory->define(App\Projectt::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'content' => $faker->paragraph(rand(2, 10), true)
    ];
});
