<?php

namespace App\Http\Controllers;


use App\Models\Price;
use App\Helpers\SavePrices\SavePriceSerg;
use App\Helpers\SavePrices\SavePriceNereida;
use App\Helpers\SavePrices\SavePriceSota;
use App\Helpers\SavePrices\SavePriceStt;

class HomeController extends Controller
{
    public function index()
    {
        $datas = Price::paginate(100);
        $data = [];
        foreach ($datas as $key => $value) {
            $data[] = $value;
        }
        return view('home.home', compact('data', 'datas'));
    }

    public function getCourse()
    {
//        $getCourse = file_get_contents('https://www.nbrb.by/api/exrates/currencies');
//        $course = json_decode($getCourse);
////        dd($course);
//        $courseId = array_filter($course,'Cur_ID' == 145);
//        dd($courseId);
//        foreach ($course as $key => $value) {
////            $a[] = $value;
//            dump($value);
//        }

    }


    public function pullPriceList(){

        $datas = Price::paginate(100);
        $data = [];
        foreach ($datas as $key => $value) {
            $data[] = $value;
        }

        $savePrice_serg = (new SavePriceSerg())->pullPriceSerge();

        $savePrice_nereida = (new SavePriceNereida())->pullPriceNereida();

        $savePrice_sota = (new SavePriceSota())->pullPriceSota();

        $savePrice_stt = (new SavePriceStt())->pullPriceStt();

        return view('home.home', compact(
            'datas',
            'data',
            'savePrice_serg',
            'savePrice_nereida',
            'savePrice_sota',
            'savePrice_stt'
        ));

    }

}

