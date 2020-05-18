<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;

use App\Category;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'category_id' => Category::all()->random()->id,
        'photo' => '1.jpg',
        'description' => $faker->text,
    ];
});
