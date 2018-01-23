<?php

use Faker\Generator as Faker;

$factory->define(\App\Ad::class, function (Faker $faker) {
    return [
            'product' => $faker->words($nb = 1, $asText = true),
            'description' => $faker->sentence,
            'price' => $faker->randomFloat(2, $min=10, $max=999),
            'supplier' => $faker->company,
            'website' => $faker->domainName,
            'coupon' => $faker->md5
        //
    ];
});
