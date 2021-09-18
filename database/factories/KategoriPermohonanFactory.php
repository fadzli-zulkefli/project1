<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\KategoriPermohonan;
use Faker\Generator as Faker;

$factory->define(KategoriPermohonan::class, function (Faker $faker) {

    return [
        'name' => $faker->word
    ];
});
