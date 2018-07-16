<?php

namespace App\Http\Controllers\Api;

use App\Eloquents\Shop;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetShopRequest;
use App\Http\Resources\ShopResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ShopController extends Controller
{
    /** @var Shop */
    private $shop;

    /**
     * CityController constructor.
     * @param Shop $shop
     */
    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }

    /**
     * @param GetShopRequest $request
     * @return ResourceCollection
     */
    public function get(GetShopRequest $request): ResourceCollection
    {
        $shops = $this->shop
            ->with(['area', 'brewery'])
            ->favorites($request->favorites)
            ->refineSearch($request->cities, $request->areas)
            ->asc()
            ->get();

        return ShopResource::collection($shops);
    }

    /**
     * @param Shop $shop
     * @return ResourceCollection
     */
    public function getNearbyShops(Shop $shop): ResourceCollection
    {
        $nears = $shop->fetchNearbyShops();

        return ShopResource::collection($nears);
    }
}
