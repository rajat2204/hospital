<?php

use Faker\Generator as Faker;

$factory->define(App\Model\TherapyDiseaseModel::class, function (Faker $faker) {
    return [
        			'therapy_disease'=>$faker->name,
    ];
});
