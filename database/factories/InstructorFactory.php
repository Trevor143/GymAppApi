<?php

use Faker\Generator as Faker;

$factory->define(\App\Instructor::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->name,
        'gym_id'=>$faker->numberBetween(1,10),
    ];
});
