<?php

namespace App\Helpers\SavePrices;


class SavePriceStt
{
    public function pullPriceStt()
    {
        $url = 'http://stt.by/upload/data/stt/Sklad.xls';
        $file_name = basename($url);
        file_put_contents(
            $_SERVER['DOCUMENT_ROOT'] ."/../storage/app/public/price_stt/" .
            iconv('windows-1251//IGNORE', 'UTF-8//IGNORE',$file_name),
            file_get_contents($url)
        );

    }
}
