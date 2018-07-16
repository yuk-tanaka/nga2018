<?php

namespace App\Http\Controllers\Web;

use App\Eloquents\Shop;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class WebController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('index');
    }

    /**
     * @return View
     */
    public function shops(): View
    {
        return view('shops');
    }

    /**
     * @param Shop $shop
     * @return View
     */
    public function showShop(Shop $shop): View
    {
        return view('shopsShow', [
            'shop' => $shop->load(['area', 'brewery']),
        ]);
    }

    /**
     * @return View
     */
    public function favorites(): View
    {
        return view('favorites');
    }

    /**
     * @return View
     */
    public function nearby(): View
    {
        return view('nearby');
    }
}
