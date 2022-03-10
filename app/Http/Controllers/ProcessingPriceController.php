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

        PriceLoadingJob::dispatch('file')->onQueue('price');

        return redirect('/');
    }
}
