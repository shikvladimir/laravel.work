<?php


namespace App\Helpers\ParsPrices;


use App\Models\Price;
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

        foreach ($productPrice as $keyPrice => $productFromPrice) {
            for ($countPrice = count($productFromPrice), $q = 0; $q < $countPrice; $q++) {
                if (is_array($productFromPrice[$q])) {


                    $products_db_product = Price::pluck('product')->toArray();
                    for ($arrCount = count($products_db_product), $i = 0; $i < $arrCount; $i++) {
                        $product_product_from_db = $products_db_product[$i];

                        if (isset($productFromPrice[$q][3])) {
                            if ($product_product_from_db == $productFromPrice[$q][3]) {
                                $arrWithProduct[] = $product_product_from_db;

                            }
                        }
                        if (isset($productFromPrice[$q][2])) {
                            if ($product_product_from_db == $productFromPrice[$q][2]) {
                                $arrWithProduct[] = $product_product_from_db;
                            }
                        }
                        if (isset($productFromPrice[$q][1])) {
                            if ($product_product_from_db == $productFromPrice[$q][1] ||
                                $product_product_from_db == $productFromPrice[$q][1] .' '. '(черный)' ||
                                $product_product_from_db == $productFromPrice[$q][1] ||
                                $product_product_from_db == substr_replace($productFromPrice[$q][1], '-', -2, 0) ||
                                $product_product_from_db == substr_replace($productFromPrice[$q][1], '-', -3, 0) ||
                                $product_product_from_db == str_replace('MK', 'mk', $productFromPrice[$q][1]) || //почему то выводит T50RPmk3 хотя её нету. С остальным работает
                                $product_product_from_db == str_ireplace('XPB', 'x Limited Edition (фиолетовый)', $productFromPrice[$q][1]) ||
                                $product_product_from_db == substr_replace($productFromPrice[$q][1], 'x', -1) ||
                                $product_product_from_db == substr_replace($productFromPrice[$q][1], ' ', -1) . '(белый)' ||
                                $product_product_from_db == substr_replace($productFromPrice[$q][1], ' ', -1) . '(черный)'
                            ) {
                                $arrWithProduct[] = $product_product_from_db;
                            }
                        }
                        if (isset($productFromPrice[$q][1]) && isset($productFromPrice[$q][2])) {
                            if ($product_product_from_db == $productFromPrice[$q][1] . $productFromPrice[$q][2] ||
//                                $product_product_from_db == $productFromPrice[$q][1] . ' ' . $productFromPrice[$q][2]. ' ' .'Wireless'  ||
                                $product_product_from_db == $productFromPrice[$q][1] . str_replace('GY', ' (серый)', $productFromPrice[$q][2]) ||
                                $product_product_from_db == $productFromPrice[$q][1] . str_replace('BK', ' (черный)', $productFromPrice[$q][2]) ||
                                $product_product_from_db == $productFromPrice[$q][1] . str_replace('WH', ' (белый)', $productFromPrice[$q][2]) ||
                                $product_product_from_db == $productFromPrice[$q][1] . str_replace('RD', ' (красный)', $productFromPrice[$q][2]) ||
                                $product_product_from_db == $productFromPrice[$q][1] . ' ' . $productFromPrice[$q][2] ||
                                $product_product_from_db == $productFromPrice[$q][1] . ' ' . substr_replace($productFromPrice[$q][2], ' ', 1, 0) ||
                                $product_product_from_db == $productFromPrice[$q][1] . ' ' . str_replace('BK', '(черный)', $productFromPrice[$q][2]) ||
                                $product_product_from_db == $productFromPrice[$q][1] . ' ' . str_replace('BL', '(синий)', $productFromPrice[$q][2]) ||
                                $product_product_from_db == $productFromPrice[$q][1] . ' ' . str_replace('WH', '(белый)', $productFromPrice[$q][2]) ||
                                $product_product_from_db == $productFromPrice[$q][1] . ' ' . str_replace('Black', '(черный)', $productFromPrice[$q][2]) ||
                                $product_product_from_db == $productFromPrice[$q][1] . ' ' . str_replace('White', '(белый)', $productFromPrice[$q][2]) ||
                                $product_product_from_db == str_replace('X', 'x', $productFromPrice[$q][1]) . ' ' .
                                str_replace('Black', '(черный)', $productFromPrice[$q][2]) ||
                                $product_product_from_db == str_replace('X', 'x', $productFromPrice[$q][1]) . ' ' .
                                str_replace('White', '(белый)', $productFromPrice[$q][2])
                            ) {
                                $arrWithProduct[] = $product_product_from_db;
                            }
                        }

                        if (isset($productFromPrice[$q][2]) && isset($productFromPrice[$q][3])) {
                            if ($product_product_from_db == $productFromPrice[$q][2] . $productFromPrice[$q][3]) {
                                $arrWithProduct[] = $product_product_from_db;
                            }

                        }

                        if (isset($productFromPrice[$q][1]) && isset($productFromPrice[$q][2]) && isset($productFromPrice[$q][3])) {
                            if ($product_product_from_db == $productFromPrice[$q][1] . ' ' . $productFromPrice[$q][2] . ' ' . $productFromPrice[$q][3] ||
//                                $product_product_from_db == $productFromPrice[$q][1] . ' ' . $productFromPrice[$q][2]  ||
                                $product_product_from_db == $productFromPrice[$q][1] . ' ' . $productFromPrice[$q][2] . ' ' .
                                str_replace('black', '(черный)', $productFromPrice[$q][3]) ||
                                $product_product_from_db == $productFromPrice[$q][1] . ' ' . $productFromPrice[$q][2] . ' ' .
                                str_replace('BLACK', '(черный)', $productFromPrice[$q][3])

                            ) {
                                $arrWithProduct[] = $product_product_from_db;
                            }

                        }

                    }
                }
            }
        }

        dd($arrWithProduct);
//dd($d);

    }
}




