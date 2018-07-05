<?php

use Faker\Generator as Faker;

$factory->define(\App\Gym::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->company,
        'mobile'=>$faker->phoneNumber,
        'latitude'=>$faker->latitude,
        'longitude'=>$faker->longitude,
        'rating'=>$faker->numberBetween(1,10)
    ];
});
