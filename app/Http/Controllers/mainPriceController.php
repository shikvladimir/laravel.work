<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;


class mainPriceController extends Controller
{
    public function mainPriceUpload(Request $request)
    {

        $file = $request->file('price');
        $rows = array_map('trim', file($file));  //к каждому элементу массива применяем функцию trim (для удаления лишних пробелов)
        array_shift($rows);  // удаляем первую строку названия полей

        $data = [];
        foreach ($rows as $key => $row) {
            $params[$key] = array_map('trim', explode(';', $row));
        }
        foreach ($params as $param) {
            $chapter = mb_convert_encoding($param[0], "UTF-8");
            $manufacturer = $param[1];
            $product = $param[2];
            $price = $param[5];
            $currency = $param[6];
            $guarantee = $param[11];
            $stock_availability = $param[14];

            $data[] = [
                'chapter' => $chapter,
                'manufacturer' => $manufacturer,
                'product' => $product,
                'price' => $price,
                'currency' => $currency,
                'guarantee' => $guarantee,
                'stock_availability' => $stock_availability
            ];


        }

        return view('home.home', compact('data'));
    }
}





















//            Price::create([
//                'chapter' => $chapter,
//                'manufacturer' => $manufacturer,
//                'product' => $product,
//                'price' => $price,
//                'currency' => $currency,
//                'guarantee' => $guarantee,
//                'stock_availability' => $stock_availability
//            ]);


//            foreach ($data as $item) {
//                $item['chapter'] = mb_strlen($item['chapter'], 'UTF-8');
//             return $item;
//            }
