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

    public function getTextAttribute(){

        $session = Any_users::query()->get('session_id');
        $session_id = null;
        foreach ($session as $value) {
            $session_id = $value->session_id;
        }

        if(session_id() == $session_id && isset($this->attributes['any_user_name'])){
            return 'hidden';
        }
    }
}
