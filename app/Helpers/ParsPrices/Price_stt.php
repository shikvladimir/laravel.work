<?php


namespace App\Helpers\ParsPrices;


use App\Models\Price;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Price_stt
{
    public function pars()
    {
        $getFileName = $_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_stt/Sklad.xls';
        $spreadsheet = IOFactory::load($getFileName);
        $data = $spreadsheet->getSheet(0)->toArray();


        for ($d = 0; $d < count($data); $d++) {
            $article_from_price = $data[$d][1];
            $price = $data[$d][3];

            if ($article_from_price != null) {
                $article_price = str_replace(' ', '', $article_from_price);

                $article_db_product = Price::pluck('article')->toArray();
                for ($i = 0; $i < count($article_db_product); $i++) {

                    $pos = stripos($article_price, $article_db_product[$i]);
                    if ($pos != false && $pos != "") {
                        $arrProduct[] = [
                            $article_db_product[$i],
                            $price
                        ];

                        foreach ($arrProduct as $article) {
                            if (iconv_strlen($article[0]) < 5) {
                                unset($article[0]);
                            } else {
                                Price::query()->where('article', '=', $article[0])
                                    ->update(['price' => round($article[1] * 0.3 + $article[1], 2)]);
                            }
                        }
                    }
                }
            }
        }
    }
}
