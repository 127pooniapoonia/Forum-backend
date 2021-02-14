<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Reply::class, function (Faker $faker) {
    return [
        'description' => $faker->text(150),
        'user_id' => factory(App\User::class),
        'post_id' => factory(App\Post::class),
        'comment_id' => factory(App\Comment::class),
    ];
});
