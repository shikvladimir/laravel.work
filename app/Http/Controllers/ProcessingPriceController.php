<?php

namespace App\Http\Controllers;


use App\Jobs\PriceLoadingJob;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


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


//        $file = Storage::get('/public/price_positions.csv');
//        $str = str_replace("\r\n", "|", $file);   //сменилась разметка файла на "\n"
//        dd($str);
////        $str = str_replace("\n", "|", $this->file);      //сменилась разметка файла на "\r"
////        $str = str_replace("\r", "|", $this->file);
//        $newRows = explode('|', $str);
//        array_shift($newRows);
//        $array = array_diff($newRows, ["", " "]);


        PriceLoadingJob::dispatch('file')->onQueue('price');


//        Price::query()->where('price', '!=', '0,00')->update(['price' => '0,00']);

        return redirect('/');
    }
}
