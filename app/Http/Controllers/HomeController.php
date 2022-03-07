<?php

namespace App\Http\Controllers;

use App\Helpers\CurrenciesInterface;
use App\Helpers\SavePrices\SavePriceSerg;
use App\Helpers\SavePrices\SavePriceNereida;
use App\Helpers\SavePrices\SavePriceShik;
use App\Helpers\SavePrices\SavePriceSota;
use App\Helpers\SavePrices\SavePriceStt;

class HomeController extends Controller
{

    public function index(CurrenciesInterface $currency)
    {
        $currency->getCourse();

        return view('home.home',compact('currency'));
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


