<?php

use Faker\Generator as Faker;

$factory->define(App\Model\YogaListModel::class, function (Faker $faker) {
    return [
      
        'disease'=>$faker->numberBetween($min = 1, $max = 20),
        'exersise'=>$faker->userName 
    ];
});
