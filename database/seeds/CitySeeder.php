<?php

use Illuminate\Database\Seeder;
use App\Eloquents\City;

class CitySeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        City::forceCreate([
           'id' => City::OSAKA,
           'name' => '大阪',
        ]);

        City::forceCreate([
            'id' => City::KOBE,
            'name' => '神戸',
        ]);

        City::forceCreate([
            'id' => City::KYOTO,
            'name' => '京都',
        ]);
    }
}
