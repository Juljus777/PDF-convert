<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Word;
use Faker\Generator as Faker;

$factory->define(Word::class, function (Faker $faker) {
    return [
        'word' => $faker->words(2, true),
        'translation' => $faker->words(2, true),
        'category' => $faker->words(2, true),
        'explanation' => $faker->sentence(30, true),
        'extra' => $faker->sentence(10, true),
    ];
});
