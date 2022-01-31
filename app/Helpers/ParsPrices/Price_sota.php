<?php


namespace App\Helpers\ParsPrices;


use App\Models\Price;
use PhpOffice\PhpSpreadsheet\IOFactory;


class Price_sota
{
    public function pars()
    {
        $openZip = new \ZipArchive;
        $getFile = $openZip->open($_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_sota/Price.zip');

        if ($getFile === TRUE) {

            if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_sota/price_sota(xlsx)/Sota_price_bn.xlsx')) {
                foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_sota/price_sota(xlsx)/Sota_price_bn.xlsx') as $file) {
                    unlink($file);
                }
            }

            $openZip->extractTo($_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_sota/price_sota(xlsx)');
            $openZip->close();
        } else {
            dump('ВНИМАНИЕ!!! При открытии Zip файла что то пошло не так');
        }

        $getFileName = $_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_sota/price_sota(xlsx)/Sota_price_bn.xlsx';
        $spreadsheet = IOFactory::load($getFileName);
        $data = $spreadsheet->getSheet(1)->toArray();

        $arrProduct = [];
        $arrProduct2 = [];

        for ($d = 0; $d < count($data); $d++) {
            $article_db = $data[$d][2];

            if ($article_db != null) {
                $article_db_product = Price::pluck('article')->toArray();
                for ($i = 0; $i < count($article_db_product); $i++) {

                    if ($article_db == $article_db_product[$i]) {
                        $arrProduct[] = $article_db_product[$i];

                    }
                }
            }
        }
        dd($arrProduct);
    }
}
