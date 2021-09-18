<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Permohonan;
use Faker\Generator as Faker;

$factory->define(Permohonan::class, function (Faker $faker) {

    return [
        'no_ic' => $faker->word,
        'name' => $faker->word,
        'kategori' => $faker->randomDigitNotNull,
        'email' => $faker->word,
        'no_tel' => $faker->word,
        'no_akaun' => $faker->word,
        'nama_bank' => $faker->word
    ];
});
