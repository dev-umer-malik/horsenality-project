<?php

use Faker\Generator as Faker;

$factory->define(App\Hy_report_type::class, function (Faker $faker) {
    return [
        'report_name' => $faker->name
    ];
});
