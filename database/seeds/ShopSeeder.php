<?php

use Flynsarmy\CsvSeeder\CsvSeeder;

class ShopSeeder extends CsvSeeder
{
    /**
     * ShopSeeder constructor.
     */
    public function __construct()
    {
        $this->table = 'shops';

        $this->filename = database_path('seeds/csvs/shop_and_brewery_list.csv');

        $this->offset_rows = 1;

        $this->mapping = [
            0 => 'id',
            1 => 'area_id',
            2 => 'name',
            3 => 'address',
            4 => 'latitude',
            5 => 'longitude',
            6 => 'opened_at',
            7 => 'closed_at',
            8 => 'tel',
            9 => 'description',
            10 => 'web',
            11 => 'twitter',
            12 => 'facebook',
            13 => 'tabelog',
        ];

        $this->should_trim = true;
    }
}
