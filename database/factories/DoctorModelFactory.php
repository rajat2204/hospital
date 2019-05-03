<?php

use Faker\Generator as Faker;

$factory->define(App\Model\DoctorModel::class, function (Faker $faker) {
    return [

      'name'=>$faker->name,

    ];
});
