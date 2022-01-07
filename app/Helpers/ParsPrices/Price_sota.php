<?php


namespace App\Helpers\ParsPrices;


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
        dd($data);


    }

}
