<?php


namespace App\Helpers\ParsPrices;


use App\Models\Price;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Price_shik
{
    public function pars()
    {

        $getFileName = $_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_shik/Склад - Лист1.xlsx';
        $spreadsheet = IOFactory::load($getFileName);
        $data = $spreadsheet->getSheet(0)->toArray();

        for ($d = 0; $d < count($data); $d++) {
            $article_price = $data[$d][1];
            $price = $data[$d][2];
            $availability = $data[$d][3];


            if ($availability == 'в наличии') {
                Price::query()->where('article', '=', $article_price)
                    ->orWhere('product', '=', $article_price)
                    ->update([
                        'price' => round($price * 0.2 + $price, 2),
                        'stock' => 'run_out_of_stock'
                    ]);
            } else {
                Price::query()->where('article', '=', $article_price)
                    ->update([
                        'price' => '0',
                        'stock' => null
                    ]);
            }
        }
    }
}
