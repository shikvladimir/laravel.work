<?php

namespace App\Http\Controllers;


use App\Helpers\UploadPrice\CSVformat;
use App\Helpers\UploadPrice\XmlFormat;
use Illuminate\Http\Request;

class GetNewPriceController extends Controller
{
    public function uploadPrice(CSVformat $getNewPrice){

        $getNewPrice->get_new_price();

        return redirect('/');
    }
}
