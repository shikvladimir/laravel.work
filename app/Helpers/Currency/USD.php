<?php


namespace App\Helpers\Currency;

use App\Helpers\CurrenciesInterface;

class USD implements CurrenciesInterface
{
    public function getCourse()
    {
//        $get_course = file_get_contents('https://www.nbrb.by/api/exrates/rates?periodicity=0');
        $get_course = file_get_contents('https://belarusbank.by/api/kursExchange?city=%D0%91%D0%B5%D1%80%D0%B5%D0%B7%D0%B8%D0%BD%D0%BE');

        $course = json_decode($get_course);
        $cur_official = null;
        foreach ($course as $key => $value) {
                $cur_official = $value->USD_out;
        }
        return $cur_official;
    }
}
