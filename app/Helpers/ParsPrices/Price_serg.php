<?php


namespace App\Helpers\ParsPrices;


use App\Helpers\CurrenciesInterface;
use App\Models\Price;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Price_serg
{
    public function pars(CurrenciesInterface $currency)
    {
        $course = $currency->getCourse();

        ini_set('max_execution_time', '0');
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

        foreach ($productPrice as $keyPrice => $productFromPrice) {
            $price = $productFromPrice[3];
            $availability = $productPrice[1];
            if($availability != 0.0){
            for ($countPrice = count($productFromPrice), $q = 0; $q < $countPrice; $q++) {

                if (is_array($productFromPrice[$q])) {

                    if (isset($productFromPrice[$q][3])) {
                        Price::query()->where('product', '=', $productFromPrice[$q][3])
                            ->update([
                                'price' => round(($price * $course+($price * $course * 0.35)),2),
                            ]);
                    }

                    if (isset($productFromPrice[$q][2])) {
                        Price::query()->where('product', '=', $productFromPrice[$q][2])
                            ->update([
                                'price' => round(($price * $course+($price * $course * 0.35)),2),
                            ]);
                    }

                    if (isset($productFromPrice[$q][1])) {
                        Price::query()->where('product', '=', $productFromPrice[$q][1])
                            ->orWhere('product', '=', $productFromPrice[$q][1] . ' ' . '(черный)')
                            ->orWhere('product', '=', substr_replace($productFromPrice[$q][1], '-', -2, 0))
                            ->orWhere('product', '=', substr_replace($productFromPrice[$q][1], '-', -3, 0))
                            ->orWhere('product', '=', substr_replace($productFromPrice[$q][1], ' ', -1) . '(белый)')
                            ->orWhere('product', '=', substr_replace($productFromPrice[$q][1], ' ', -1) . '(черный)')
                            ->orWhere('product', '=', str_replace('MK', 'mk', $productFromPrice[$q][1]))
                            ->orWhere('product', '=', str_ireplace('XPB', 'x Limited Edition (фиолетовый)', $productFromPrice[$q][1]))
                            ->orWhere('product', '=', substr_replace($productFromPrice[$q][1], 'x', -1))
                            ->update([
                                'price' => round(($price * $course+($price * $course * 0.35)),2),
                            ]);

                    }

                    if (isset($productFromPrice[$q][1]) && isset($productFromPrice[$q][2])) {
                        Price::query()->where('product', '=', $productFromPrice[$q][1] . $productFromPrice[$q][2])
                            ->orWhere('product', '=', $productFromPrice[$q][1] . str_replace('GY', ' (серый)', $productFromPrice[$q][2]))
                            ->orWhere('product', '=', $productFromPrice[$q][1] . str_replace('BK', ' (черный)', $productFromPrice[$q][2]))
                            ->orWhere('product', '=', $productFromPrice[$q][1] . str_replace('WH', ' (белый)', $productFromPrice[$q][2]))
                            ->orWhere('product', '=', $productFromPrice[$q][1] . str_replace('RD', ' (красный)', $productFromPrice[$q][2]))
                            ->orWhere('product', '=', $productFromPrice[$q][1] . ' ' . $productFromPrice[$q][2])
                            ->orWhere('product', '=', $productFromPrice[$q][1] . ' ' . substr_replace($productFromPrice[$q][2], ' ', 1, 0))
                            ->orWhere('product', '=', $productFromPrice[$q][1] . ' ' . str_replace('BK', '(черный)', $productFromPrice[$q][2]))
                            ->orWhere('product', '=', $productFromPrice[$q][1] . ' ' . str_replace('BL', '(синий)', $productFromPrice[$q][2]))
                            ->orWhere('product', '=', $productFromPrice[$q][1] . ' ' . str_replace('WH', '(белый)', $productFromPrice[$q][2]))
                            ->orWhere('product', '=', $productFromPrice[$q][1] . ' ' . str_replace('Black', '(черный)', $productFromPrice[$q][2]))
                            ->orWhere('product', '=', $productFromPrice[$q][1] . ' ' . str_replace('White', '(белый)', $productFromPrice[$q][2]))
                            ->orWhere('product', '=', str_replace('X', 'x', $productFromPrice[$q][1]) . ' ' .
                                str_replace('Black', '(черный)', $productFromPrice[$q][2]))
                            ->orWhere('product', '=', str_replace('X', 'x', $productFromPrice[$q][1]) . ' ' .
                                str_replace('White', '(белый)', $productFromPrice[$q][2]))
                            ->update([
                                'price' => round(($price * $course+($price * $course * 0.35)),2),
                            ]);
                    }

                    if (isset($productFromPrice[$q][2]) && isset($productFromPrice[$q][3])) {
                        Price::query()->where('product', '=', $productFromPrice[$q][2] . $productFromPrice[$q][3])
                            ->orWhere('product', '=', $productFromPrice[$q][1] . ' ' . $productFromPrice[$q][2] . ' ' . $productFromPrice[$q][3])
                            ->orWhere('product', '=', $productFromPrice[$q][1] . ' ' . $productFromPrice[$q][2] . ' ' .
                                str_replace('black', '(черный)', $productFromPrice[$q][3]))
                            ->orWhere('product', '=', $productFromPrice[$q][1] . ' ' . $productFromPrice[$q][2] . ' ' .
                                str_replace('BLACK', '(черный)', $productFromPrice[$q][3]))
                            ->update([
                                'price' => round(($price * $course+($price * $course * 0.35)),2),
                            ]);
                    }
                    }
//                    if(isset($productFromPrice[$q][1]) && isset($productFromPrice[$q][2]) && isset($productFromPrice[$q][3])){
//                        Price::query()->where('product', '=',$productFromPrice[$q][1] . ' ' . $productFromPrice[$q][2] . ' ' . $productFromPrice[$q][3])
//                            ->orWhere('product', '=',$productFromPrice[$q][1] . ' ' . $productFromPrice[$q][2] . ' ' .
//                                str_replace('black', '(черный)', $productFromPrice[$q][3]))
//                            ->orWhere('product', '=',$productFromPrice[$q][1] . ' ' . $productFromPrice[$q][2] . ' ' .
//                                str_replace('BLACK', '(черный)', $productFromPrice[$q][3]))
//                            ->update([
//                                'price' => 5,
//                            ]);
//                    }
                }
            }
        }
    }
}




