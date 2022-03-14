<?php

namespace App\Http\Controllers;


use App\Helpers\AllPriceProcessing\AllPriceProcessing;
use App\Helpers\CurrenciesInterface;

class AllPricesListsController extends Controller
{
    public function allPricesLists(CurrenciesInterface $currency, AllPriceProcessing $allPriceProcessing)
    {
        $allPriceProcessing->allPriceProcessing($currency);

        return redirect('/');
    }
}
