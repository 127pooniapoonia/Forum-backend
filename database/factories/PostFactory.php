<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Post::class, function ($faker) {
    return [
        'description' =>  $faker->text(200),
        'user_id' => factory(App\User::class),
        'topic_id' => factory(App\Topic::class),
    ];
});