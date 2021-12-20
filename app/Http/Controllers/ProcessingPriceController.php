<?php

namespace App\Http\Controllers;

use App\Jobs\PriceLoadingJob;
use App\Models\Price;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function GuzzleHttp\Promise\all;


class ProcessingPriceController extends Controller
{
    public function processingPrice(Request $request)
    {
        $nameFile = 'any_name.csv';
        $disc = Storage::allFiles('public');
        foreach ($disc as $key => $value) {
            if ($value == preg_match("/[a-zA-Zа-яА-Я0-9_-]+.[csv]$/", $nameFile)) {
                Storage::delete($value);
            }
        }


        $fileCSV = $request->file('price');
        Storage::disk('public')
            ->putFileAs('', $fileCSV, 'price_positions.csv');
        $file = Storage::get('/public/price_positions.csv');              //price_positions.csv
        $str = str_replace("\r\n", "|", $file);
        $newRows = explode('|', $str);
        array_shift($newRows);

//        $file = $request->file('price');
//        $rows = array_map('trim', file($file));
//        array_shift($rows);
        foreach ($newRows as $key => $row) {
            $params[$key] = array_map('trim', explode(';', $row));
        }
        foreach ($params as $item) {
            if ($item == '') {
                unset($item);
            }
            dd($params);
        }
        die();
//        dd($item);

//        dd($params);
        foreach ($params as $param) {
            $chapter = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[0]);
            $manufacturer = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[1]);
            $product = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[2]);
            $article = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[3]);
            $number_offers = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[4]);
            $price = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[5]);
            $currency = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[6]);
            $description = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[7]);
            $maker = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[8]);
            $importer = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[9]);
            $service_center = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[10]);
            $guarantee = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[11]);
            $delivery_Minsk = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[12]);
            $delivery_RB = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[13]);
            $service_life = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[14]);
            $for_business = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[15]);
            $credit = mb_convert_encoding($param[16], 'UTF-8', 'windows-1251');
            $stock = $param[17] === '' ? '' : 'run_out_of_stock';
            $installment_payment = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[18]);
            $price_halva = $param[19];

            Price::create([
                'chapter' => $chapter,
                'manufacturer' => $manufacturer,
                'product' => $product,
                'article' => $article,
                'number_offers' => $number_offers,
                'price' => $price,
                'currency' => $currency,
                'description' => $description,
                'maker' => $maker,
                'importer' => $importer,
                'service_center' => $service_center,
                'guarantee' => $guarantee,
                'delivery_Minsk' => $delivery_Minsk,
                'delivery_RB' => $delivery_RB,
                'stock' => $stock,
                'service_life' => $service_life,
                'for_business' => $for_business,
                'credit' => $credit,
                'installment_payment' => $installment_payment,
                'price_halva' => $price_halva,
            ]);
        }
//        return view('home.home');
        return redirect()->route('/');
    }

//    public function queueProcessing(Request $request){
//        PriceLoadingJob::dispatch();
//        return view('home.home');
//    }

    public function getPrice()
    {
        $datas = DB::table('prices')->get();// через модель
        $data = [];
        foreach ($datas as $key => $value) {
            $data[] = $value;
        }

        return view('home.home', compact('data'));
    }
}
