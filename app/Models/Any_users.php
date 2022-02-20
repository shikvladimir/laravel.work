<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Any_users extends Model
{
    use HasFactory;

    protected $fillable = [
        'any_user_name',
    ];

    public function chat(){
        return $this->hasOne(Chats::class);
    }
}
