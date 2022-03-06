<?php

namespace App\Http\Controllers;

use App\Helpers\SavePrices\SavePriceSerg;
use App\Helpers\SavePrices\SavePriceNereida;
use App\Helpers\SavePrices\SavePriceShik;
use App\Helpers\SavePrices\SavePriceSota;
use App\Helpers\SavePrices\SavePriceStt;
use App\Helpers\USD;

class HomeController extends Controller
{
    public function index()
    {
        (new USD())->getCourse();

        return view('home.home');
    }

    public function pullPriceList()
    {
        (new SavePriceSerg())->pullPriceSerge();
        (new SavePriceNereida())->pullPriceNereida();
        (new SavePriceSota())->pullPriceSota();
        (new SavePriceStt())->pullPriceStt();
        (new SavePriceShik())->pullPriceShik();

        return redirect('/');
    }

}


