<?php


namespace App\Helpers\ParsPrices;


use App\Models\Price;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Price_nereida
{
    public function pars()
    {
        $getFileName = $_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_nereida/Nereida_Price.xlsx';
        $spreadsheet = IOFactory::load($getFileName);
        $data = $spreadsheet->getSheet(0)->toArray();
        array_shift($data);

        for ($d = 0; $d < count($data); $d++) {
            $article_price = $data[$d][4];
            $availability = $data[$d][8];
            $price = $data[$d][5];

            if ($article_price != null) {
                if ($availability != 'резерв') {
                    Price::query()->where('article', '=', $article_price)
                        ->update(['price' => round((float)$price * 0.3 + (float)$price, 2)]);
                } else {
                    Price::query()->where('article', '=', $article_price)
                        ->update(['price' => '0,00']);
                }
            }
        }


    }


}
