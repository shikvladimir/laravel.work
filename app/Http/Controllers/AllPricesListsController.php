<?php

namespace App\Http\Controllers;


use App\Helpers\ParsPrices\Price_nereida;
use App\Helpers\ParsPrices\Price_serg;
use App\Helpers\ParsPrices\Price_sota;
use App\Helpers\ParsPrices\Price_stt;


class AllPricesListsController extends Controller
{
    public function allPricesLists()
    {
        $list = $_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing';
        $files = scandir($list);
        unset($files[0]);
        unset($files[1]);

        $working_prices = [];
        if (!empty ($_POST ['isChecked'])) {
            foreach ($_POST ['isChecked'] as $value) {
                $working_prices[] = $files[$value];
            }
        }

        $price_sota = null;
        $price_stt = null;
        $price_serg = null;
        $price_nereida = null;

        foreach ($working_prices as $key => $working_price) {
            if ($working_price == "price_sota") {
                $price_sota = (new Price_sota())->pars();
            } else {
                $price_sota = "";
            }

            if ($working_price == "price_stt") {
                $price_stt = (new Price_stt())->pars();
            } else {
                $price_stt = "";
            }

            if ($working_price == "price_serg") {
                $price_serg = (new Price_serg())->pars();
            } else {
                $price_serg = "";
            }

            if ($working_price == "price_nereida") {
                $price_nereida = (new Price_nereida())->pars();
            } else {
                $price_nereida = "";
            }
        }


        return redirect('/',compact(
            'files',
            'price_sota',
            'price_stt',
            'price_serg',
            'price_nereida',
        ));

//        return view('home.home', compact(
//            'files',
//            'price_sota',
//            'price_stt',
//            'price_serg',
//            'price_nereida'
//        ));
    }
}
