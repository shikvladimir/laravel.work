<?php


namespace App\Helpers\SavePrices;


class SavePriceShik
{


    public function pullPriceShik()
    {
        $url = 'https://docs.google.com/spreadsheets/d/1OF8QiBhAOHfSclKAexdDm8JesvgpgYCRANwgF6yvovw/export?gid=0';
        $path = $_SERVER['DOCUMENT_ROOT'] . "/../prices_for_processing/price_shik/Склад - Лист1.xlsx";
        $file_name = basename($url);

        if (!empty($file_name)) {

            if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_shik/Склад - Лист1.xlsx')) {
                foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_shik/Склад - Лист1.xlsx') as $file) {
                    unlink($file);
                }
            }

            file_put_contents($path,file_get_contents($url));

        } else {
            dump('Не удалось получит ссылку на скачивание');
        }

    }
}
