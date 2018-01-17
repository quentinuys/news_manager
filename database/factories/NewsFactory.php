<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\News::class, function (Faker $faker) {
    return [
        'title' => substr($faker->sentence(2), 0, -1),
        'description' => $faker->paragraph,
        'image_path' => 'http://'.$faker->sentence(3).'png',
    ];
});
