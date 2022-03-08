<?php

namespace App\Jobs;

use App\Models\Price;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isEmpty;

class PriceLoadingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $table = Price::query()->get();
        if (!empty($table)) {
            Price::query()->delete();
        }

        $this->file = Storage::get('/public/price_positions.csv');
//        $str = str_replace("\r\n", "|", $this->file);   //сменилась разметка файла на "\n"
        $str = str_replace("\n", "|", $this->file);      //сменилась разметка файла на "\r"
//        $str = str_replace("\r", "|", $this->file);
        $newRows = explode('|', $str);
        array_shift($newRows);
        $array = array_diff($newRows, ["", " "]);


        foreach ($array as $key => $row) {
            $params[$key] = array_map('trim', explode(';', $row));
        }

        foreach ($params as $param) {
            $chapter = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[0]);
            $manufacturer = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[1]);
            $product = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[2]);
            $article = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[3]);
            $number_offers = $param[4];
//            $price = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[5]);
            $price = '0,00';
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
//            $stock = $param[17] === '' ? '' : 'run_out_of_stock';
            $stock = $param[17] === '';
            $installment_payment = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $param[18]);
            $price_halva = $param[19];
            $onliner_prime = mb_convert_encoding($param[20], 'UTF-8', 'windows-1251');


            Price::query()->create([
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
                'onliner_prime' => $onliner_prime,
            ]);
        }
    }
}
