<?php

namespace App\Http\Controllers\Api;

use App\Eloquents\City;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CityController extends Controller
{
    /** @var City */
    private $city;

    /**
     * CityController constructor.
     * @param City $city
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }

    /**
     * @return ResourceCollection
     */
    public function get(): ResourceCollection
    {
        $cities = $this->city->with(['areas'])->asc()->get();

        return CityResource::collection($cities);
    }
}
