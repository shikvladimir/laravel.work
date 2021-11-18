<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'lastname',
        'organization',
        'number_phone',
        'email',
        'password',
        'confirmed',
        'photo'
    ];

    public function getPagePhotoAttribute(){
        if (Storage::exists($this->attributes['photo'])){
            return(Storage::url($this->attributes['photo']));
        }
        return '/admin/user_photo.png';
    }

    public function getCheckAttribute(){
        if($this->attributes['confirmed'] == 1){
            return 'checked';
        }
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
