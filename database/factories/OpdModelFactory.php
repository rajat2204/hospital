<?php

use Faker\Generator as Faker;

$factory->define(App\Model\OpdModel::class, function (Faker $faker) {
    return [
            
            'id'=>$faker->numberBetween(1000,8000),
            'patientName'=>$faker->name,
            'regNum'=>$faker->numberBetween(1000,8000),
           
    ];
});
