<?php

use Faker\Generator as Faker;

$factory->define(App\Model\PotencyModel::class, function (Faker $faker) {
    return [
        	'name' => $faker->name,
    ];
});
