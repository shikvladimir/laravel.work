<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'chapter',
        'manufacturer',
        'product',
        'price',
        'currency',
        'guarantee',
        'article',
        'number_offers',
        'description',
        'maker',
        'importer',
        'service_center',
        'delivery_Minsk',
        'delivery_RB',
        'stock',
        'service_life',
        'for_business',
        'credit',
        'installment_payment',
        'price_halva'
    ];
}
