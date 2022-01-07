<?php

namespace App\Http\Controllers;


use App\Helpers\SavePrices\SavePriceSerg;
use App\Helpers\SavePrices\SavePriceNereida;
use App\Helpers\SavePrices\SavePriceSota;
use App\Helpers\SavePrices\SavePriceStt;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.home');
    }


    public function pullPriceList()
    {
//        $savePrice_serg = (new SavePriceSerg())->pullPriceSerge();

//        $savePrice_nereida = (new SavePriceNereida())->pullPriceNereida();

//        $savePrice_sota = (new SavePriceSota())->pullPriceSota();
//
        $savePrice_stt = (new SavePriceStt())->pullPriceStt();

        return view('home.home', compact(
//            'savePrice_serg',
//            'savePrice_nereida',
//            'savePrice_sota',
            'savePrice_stt'
        ));

    }

}


//    public function getCourse()
//    {
////        $getCourse = file_get_contents('https://www.nbrb.by/api/exrates/currencies');
////        $course = json_decode($getCourse);
//////        dd($course);
////        $courseId = array_filter($course,'Cur_ID' == 145);
////        dd($courseId);
////        foreach ($course as $key => $value) {
//////            $a[] = $value;
////            dump($value);
////        }
//
//    }
