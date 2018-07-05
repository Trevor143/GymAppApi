<?php

use Faker\Generator as Faker;

$factory->define(\App\Profile::class, function (Faker $faker) {
    return [
        //
        'user_id'=>$faker->unique->numberBetween(1,10),
        'age'=>$faker->numberBetween(18,65),
        'weight'=>$faker->numberBetween(45,180),
        'targetWeight'=>$faker->numberBetween(35,150),
        'gym_id'=>$faker->numberBetween(1,10)
    ];
});
