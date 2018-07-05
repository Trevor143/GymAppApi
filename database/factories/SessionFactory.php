<?php

use Faker\Generator as Faker;

$factory->define(\App\Session::class, function (Faker $faker) {
    return [
        //
        'user_id'=>$faker->numberBetween(1,10),
        'exerciseType'=>$faker->randomElement(['PushUps',
            'Squats','WeightLifting','Aerobics','Boxing']),
        'Sets'=>$faker->numberBetween(1,25),
        'gym_id'=>$faker->numberBetween(1,10),
        'instructor_id'=>$faker->numberBetween(1,10),
    ];
});
