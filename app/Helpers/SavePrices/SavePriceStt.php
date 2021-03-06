<?php

namespace App\Helpers\SavePrices;


class SavePriceStt
{

    public function pullPriceStt()
    {
        $url = 'http://stt.by/upload/data/stt/Sklad.xls';
        $file_name = basename($url);

        if (!empty($file_name)) {

            if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_stt/Sklad.xls')) {
                foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_stt/Sklad.xls') as $file) {
                    unlink($file);
                }
            }

            file_put_contents(
                $_SERVER['DOCUMENT_ROOT'] . "/../prices_for_processing/price_stt/" .
                iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $file_name),
                file_get_contents($url)
            );
        } else {
            dump('Не удалось получит ссылку на скачивание');
        }

    }
}
