<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Application::class, function (Faker $faker) {
    return [
        // 'charge'=>$faker->
        // 'duration'=>$faker->
        // 'time'=>$faker->
        // 'user_id'=>App\User::pluck('id')->random()
    ];
});
