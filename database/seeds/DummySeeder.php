<?php

use App\Eloquents\Brewery;
use App\Eloquents\Shop;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Shop::class, 50)
            ->create()
            ->each(function (Shop $shop) {
                factory(Brewery::class, 1)->create(['shop_id' => $shop->id]);
            });
    }
}
