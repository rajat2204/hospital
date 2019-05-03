<?php

use Faker\Generator as Faker;

$factory->define(App\Model\PhysiotherapylistModel::class, function (Faker $faker) {
    return [
       'disease'=>$faker->name,
       'therapy'=>$faker->firstName,
    ];
});
