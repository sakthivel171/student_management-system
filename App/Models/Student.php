<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as authenticable;

class Student extends authenticable
{
    //
    use HasFactory;

        protected $fillable = [
        'class_id',
        'admission_no',
        'name',
        'email',
        'password',
        'phone',
        'roll_no',
        'date_of_birth',
        'address',
        'admission_date',
        'father_name',
        'mother_name',
        'father_occupation',
        'mother_occupation',
        'contact'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function casts():array{
        return [
            'password'=>'hashed',
            'date_of_birth'=> 'date',
            'admission date'=>'date',
        ];
    }
    public function class(){
        return $this->belongsTo(Classes::class,'class_id');
    }
    
    public function teachers()
    {
        return $this->class->teachers();
    }
    
    public function subjects()
    {
        return $this->class->subjects();
    }
}
