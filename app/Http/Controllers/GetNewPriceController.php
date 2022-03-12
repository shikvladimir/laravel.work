<?php

namespace App\Http\Controllers;


use App\Helpers\UploadPrice\GetNewPrice;
use Illuminate\Http\Request;

class GetNewPriceController extends Controller
{
    public function uploadPrice(GetNewPrice $getNewPrice){

        $getNewPrice->get_new_price();

        return redirect('/');
    }
}
