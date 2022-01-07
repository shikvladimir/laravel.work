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
            $openZip->extractTo($_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_sota/price_sota(xlsx)');
            $openZip->close();
        }else{
            dump('ВНИМАНИЕ!!! При открытии Zip файла что то пошло не так');
        }

//        $typeFile = 'xlsx';
//        $getFileName = $_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_sota/price_sota(xlsx)/Sota_price_bn.xlsx';
//        $readerFile = IOFactory::createReader($typeFile);
//        dd($readerFile);
//        $spreadsheet = $readerFile->load($getFileName);


    }

}
