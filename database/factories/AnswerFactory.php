<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph(rand(2,5),true),
        'votes_count'=>rand(0,10),
        'user_id' => \App\User::pluck('id')->random(),
        'question_id'=>\App\Question::pluck("id")->random()
    ];
});
