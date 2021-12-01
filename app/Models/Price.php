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
        'stock_availability'
    ];
}
