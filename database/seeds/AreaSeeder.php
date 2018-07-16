<?php

use Illuminate\Database\Seeder;
use App\Eloquents\Area;
use App\Eloquents\City;

class AreaSeeder extends Seeder
{
    /** @var array */
    const COLORS = [
        '#409EFF',
        '#40FF9E',
        '#FFA140',
        '#FEFF40',
        '#FF4240',
        '#A140FF',
        '#A1FF00',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Area::forceCreate([
            'id' => Area::UMEDA,
            'city_id' => City::OSAKA,
            'name' => '梅田・北新地・中津',
            'color' => self::COLORS[0],
        ]);
        Area::forceCreate([
            'id' => Area::TENMA,
            'city_id' => City::OSAKA,
            'name' => '天満・南森町',
            'color' => self::COLORS[1],
        ]);
        Area::forceCreate([
            'id' => Area::FUKUSHIMA,
            'city_id' => City::OSAKA,
            'name' => '福島・野田',
            'color' => self::COLORS[2],
        ]);
        Area::forceCreate([
            'id' => Area::MIYAKOJIMA,
            'city_id' => City::OSAKA,
            'name' => '都島',
            'color' => self::COLORS[3],
        ]);
        Area::forceCreate([
            'id' => Area::HONMACHI,
            'city_id' => City::OSAKA,
            'name' => '本町・心斎橋',
            'color' => self::COLORS[4],
        ]);
        Area::forceCreate([
            'id' => Area::NANBA,
            'city_id' => City::OSAKA,
            'name' => '難波・日本橋',
            'color' => self::COLORS[5],
        ]);
        Area::forceCreate([
            'id' => Area::TSURUHASHI,
            'city_id' => City::OSAKA,
            'name' => '鶴橋・今里・玉造',
            'color' => self::COLORS[6],
        ]);

        /*
         * 神戸
         */
        Area::forceCreate([
            'id' => Area::SANNOMIYA,
            'city_id' => City::KOBE,
            'name' => '三宮駅周辺',
            'color' => self::COLORS[0],
        ]);
        Area::forceCreate([
            'id' => Area::MOTOMACHI,
            'city_id' => City::KOBE,
            'name' => '元町・神戸',
            'color' => self::COLORS[1],
        ]);

        /*
         * 京都
         */
        Area::forceCreate([
            'id' => Area::KARASUMA,
            'city_id' => City::KYOTO,
            'name' => '烏丸・河原町',
            'color' => self::COLORS[0],
        ]);
        Area::forceCreate([
            'id' => Area::SAI,
            'city_id' => City::KYOTO,
            'name' => '西院・堀川',
            'color' => self::COLORS[1],
        ]);
    }

}
