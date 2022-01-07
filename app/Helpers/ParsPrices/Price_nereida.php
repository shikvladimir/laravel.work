<?php


namespace App\Helpers\ParsPrices;


use PhpOffice\PhpSpreadsheet\IOFactory;

class Price_nereida
{
    public function pars()
    {
        $getFileName = $_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_nereida/Nereida_Price.xlsx';
        $spreadsheet = IOFactory::load($getFileName);
        $data = $spreadsheet->getSheet(0)->toArray();
        dd($data);
    }
}
