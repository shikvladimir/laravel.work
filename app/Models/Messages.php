<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
    ];


//    public function getTextAttribute(){
//        if($this->attributes['chat_id'] == 1){
//            return 'hidden';
//        }
//    }
}
