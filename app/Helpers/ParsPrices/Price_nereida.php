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

        $arrProduct = [];
        for ($d = 0; $d < count($data); $d++) {
            $article_price = $data[$d][4];
            $availability = $data[$d][8];

            if ($article_price != null) {
                $article_db_product = Price::pluck('article')->toArray();
                for ($i = 0; $i < count($article_db_product); $i++) {

                    if ($article_price == $article_db_product[$i] && $availability != 'резерв') {
                        $arrProduct[] = $article_db_product[$i];

                    }
                }
            }
        }
        dd($arrProduct);
    }
}
