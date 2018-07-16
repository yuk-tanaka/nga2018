<?php

use \App\Eloquents\Area;
use App\Eloquents\Shop;
use Carbon\Carbon;
use Faker\Factory as FakerFactory;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    $open = [
        '2018-10-01T12:00:00',
        '2018-10-01T12:30:00',
        '2018-10-01T13:00:00',
        '2018-10-01T13:30:00',
        '2018-10-01T14:00:00',
        '2018-10-01T14:15:00',
        '2018-10-01T14:30:00',
        '2018-10-01T14:45:00',
        '2018-10-01T15:00:00',
    ];

    $close = [
        '2018-10-01T19:00:00',
        '2018-10-01T19:30:00',
        '2018-10-01T20:00:00',
        '2018-10-01T20:30:00',
        '2018-10-01T21:00:00',
        '2018-10-01T21:15:00',
        '2018-10-01T21:30:00',
        '2018-10-01T21:45:00',
        '2018-10-01T22:00:00',
    ];

    $faker = FakerFactory::create('ja_JP');

    return [
        'area_id' => $faker->numberBetween(1, Area::count()),
        'name' => $faker->word,
        'address' => $faker->address,
        'latitude' => $faker->latitude(35, 40),
        'longitude' => $faker->longitude(135, 145),
        'opened_at' => Carbon::parse($faker->randomElement($open)),
        'closed_at' => Carbon::parse($faker->randomElement($close)),
        'tel' => $faker->boolean ? $faker->phoneNumber : null,
        'description' => $faker->realText(50),
        'web' => $faker->boolean ? $faker->url : null,
        'twitter' => $faker->boolean ? $faker->url : null,
        'facebook' => $faker->boolean ? $faker->url : null,
        'tabelog' => $faker->boolean ? $faker->url : null,
    ];
});
