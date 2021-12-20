<?php

namespace App\Http\Livewire;

use App\Models\Price;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Search extends Component
{
    public $searchProduct;
    public $prices;

    public function render()
    {
        $searchProduct = '%'. $this->searchProduct .'%';

        $this->prices = Price::where(DB::raw("CONCAT(`manufacturer`, ' ', `product`)"), 'LIKE', "%".$searchProduct."%")
            ->orWhere(DB::raw("CONCAT(`product`, ' ', `manufacturer`)"), 'LIKE', "%".$searchProduct."%")
            ->limit(7)
            ->get();

        return view('livewire.search');
    }
}
