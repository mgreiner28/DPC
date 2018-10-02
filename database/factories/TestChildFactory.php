<?php

$factory->define(App\TestChild::class, function (Faker\Generator $faker) {
    return [
        "field_one" => $faker->name,
        "field_two" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
        "created_by_team_id" => factory('App\Team')->create(),
    ];
});
