<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Word;
use Faker\Generator as Faker;

$factory->define(Word::class, function (Faker $faker) {
    $i = rand(10,30);
    $j = rand(5,15);
    $l = rand(1,2);
    return [
        'word' => $faker->words($l, true),
        'translation' => $faker->words($l, true),
        'category' => $faker->words($l, true),
        'explanation' => $faker->sentence($i, true),
        'extra' => $faker->sentence($j, true),
    ];
});
