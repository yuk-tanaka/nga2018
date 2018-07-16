<?php

use App\Eloquents\Brewery;
use Faker\Factory as FakerFactory;
use Faker\Generator as Faker;

$factory->define(Brewery::class, function (Faker $faker) {

    $faker = FakerFactory::create('ja_JP');

    return [
        'name' => $faker->word,
        'company_name' => $faker->word . '酒造',
        'prefecture' => $faker->prefecture,
        'web' => $faker->boolean ? $faker->url : null,
        'twitter' => $faker->boolean ? $faker->url : null,
        'facebook' => $faker->boolean ? $faker->url : null,
    ];
});
