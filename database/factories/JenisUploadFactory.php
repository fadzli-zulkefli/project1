<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\JenisUpload;
use Faker\Generator as Faker;

$factory->define(JenisUpload::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'template_file' => $faker->word,
        'kategori_1' => $faker->randomDigitNotNull,
        'kategori_1_wajib' => $faker->randomDigitNotNull,
        'kategori_2' => $faker->randomDigitNotNull,
        'kategori_2_wajib' => $faker->randomDigitNotNull,
        'item_order' => $faker->randomDigitNotNull
    ];
});
