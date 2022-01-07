<?php


namespace App\Helpers\ParsPrices;


use PhpOffice\PhpSpreadsheet\IOFactory;

class Price_stt
{
    public function pars(){
        $getFileName = $_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_stt/Sklad.xls';
        $spreadsheet = IOFactory::load($getFileName);
        $data = $spreadsheet->getSheet(0)->toArray();
        dd($data);


//        $cells = [];
//        foreach ($spreadsheet->getWorksheetIterator() as $data) {
//
//            $cells[] = $data->toArray();
//            dd($cells);
//
//        }
    }
}
