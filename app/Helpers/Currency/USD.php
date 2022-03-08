<?php


namespace App\Helpers\Currency;

use App\Helpers\CurrenciesInterface;

class USD implements CurrenciesInterface
{
    public function getCourse()
    {

        $get_course = file_get_contents('https://www.nbrb.by/api/exrates/rates?periodicity=0');

//        if ($get_course != true) {
//            dump("Ошибка соединения с NBRB" );
//            exit;
//        }

        $course = json_decode($get_course);

        $cur_official = null;
        foreach ($course as $key => $value) {
            if($value->Cur_Name == 'Доллар США'){
                $cur_official = $value->Cur_OfficialRate;
            }
        }
        return $cur_official;
    }
}
