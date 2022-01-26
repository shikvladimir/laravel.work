<?php


namespace App\Helpers\ParsPrices;


use App\Models\Price;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

class Price_serg
{
    public function pars()
    {
        $getFileName = $_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_serg/PRICE.xls';
        $spreadsheet = IOFactory::load($getFileName);

        $data = $spreadsheet->getSheet(0)->toArray();

        $nameProduct = [];
        $count = count($data);
        for ($item = 0; $item < $count; $item++) {
            $nameProduct[] = $data[$item];
        }
        array_shift($nameProduct);

        $productPrice = [];
        foreach ($nameProduct as $value) {
            if ($value[0] != null
                && $value[1] == null
                && $value[2] == null
                && $value[3] == null
                && $value[4] == null
                && $value[5] == null) {
                unset($value);
            } else {
                $value[0] = explode(' ', $value[0]);
                $productPrice[] = $value;
            }
        }
        $arrWithProduct = [];
        $name_product_from_price = null;
        $name_product_from_db = null;
        foreach ($productPrice as $keyPrice => $productFromPrice) {
            for ($countPrice = count($productFromPrice), $q = 0; $q < $countPrice; $q++) {
                if (is_array($productFromPrice[$q])) {
                    foreach ($productFromPrice[$q] as $k => $name_product_from_price) {

                            $products_db_product = Price::pluck('product')->toArray();
                            for ($arrCount = count($products_db_product), $i = 0; $i < $arrCount; $i++) {
                                $product_product_from_db = $products_db_product[$i];
                                if ($product_product_from_db == $name_product_from_price) {
                                    $arrWithProduct[] = $product_product_from_db;
                                }
                            }
                        }
                    }
                }
            }
            dd($arrWithProduct);

        }

}
