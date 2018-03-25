<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5,false),
        'excerpt' =>$faker->sentence(1),
        'body' => $faker->paragraph(4, false),
        'published_at' => date_create('now')->format('Y-m-d H:i:s')
    ];
});
