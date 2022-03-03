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


        for ($d = 0; $d < count($data); $d++) {
            $article_price = $data[$d][2];
            $rrc = $data[$d][5];
            $availability = $data[$d][9];

            if ($article_price != null) {

                if ($availability != null) {
                    Price::query()->where('article', '=', $article_price)
                        ->update(['price' => $rrc]);
                }

            }
        }
    }

}
