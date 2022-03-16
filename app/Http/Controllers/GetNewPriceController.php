<?php

namespace App\Http\Controllers;


use App\Helpers\GetNewPriceInterface;

class GetNewPriceController extends Controller
{
    public function uploadPrice(GetNewPriceInterface $getNewPrice){

        $getNewPrice->get_new_price();

        return redirect('/');
    }
}
