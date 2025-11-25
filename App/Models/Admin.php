<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as authenticable;


class Admin extends authenticable
{   
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',    
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts() :array{
        
        return[
            'password'=>'hashed',
        ];
    }
}
