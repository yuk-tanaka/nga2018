<?php

use Flynsarmy\CsvSeeder\CsvSeeder;

class BrewerySeeder extends CsvSeeder
{
    /**
     * ShopSeeder constructor.
     */
    public function __construct()
    {
        $this->table = 'breweries';

        $this->filename = database_path('seeds/csvs/shop_and_brewery_list.csv');

        $this->offset_rows = 1;

        $this->mapping = [
            0 => 'shop_id',
            14 => 'name',
            15 => 'company_name',
            16 => 'prefecture',
            17 => 'web',
            18 => 'twitter',
            19 => 'facebook',
        ];

        $this->should_trim = true;
    }
}
