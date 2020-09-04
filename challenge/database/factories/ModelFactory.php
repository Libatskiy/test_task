<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->defineAs(\App\Models\Hookah::class,'hookahs', function(\Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->numerify('Hookah ##'),
        'pipe' => $faker->numberBetween(1, 5),
        'price' => $faker->numberBetween(10, 150),
    ];
});

$factory->defineAs(\App\Models\Reservation::class,'reservation', function(\Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->name(),
        'number_people' => $faker->numberBetween(1, 10),
        'time_from' => $faker->dateTimeBetween('now', '+5 day'),
        'status' => \App\Models\Reservation::STATUS_ACTIVE,
    ];
});

$factory->defineAs(\App\Models\HookahRelation::class,'relation', function(\Faker\Generator $faker) {
    $bar = \App\Models\HookahBar::on()->pluck('id');
    return [
        'hookah_bar_id' => $bar[rand(1, count($bar)) - 1],
    ];
});
