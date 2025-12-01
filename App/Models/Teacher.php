<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as authenticable;
use Illuminate\Support\Arr;

class Teacher extends authenticable
{
    //
    use HasFactory;

    protected $fillable = [
        'department_id',
        'name',
        'email',
        'password',
        'phone',
        'employee_id',
        'qualification',
        'joining_date',
        'profile_image',
    ];
 
    protected $hidden = [
        'password',
        'remember_token'
    ];
    protected $casts = [
        'password' => 'hashed',
        'joining_date' => 'date:Y-m-d',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class,'class_teacher_subject','teacher_id','class_id')
        ->withPivot('subject_id','academic_year')
        ->withTimestamps();
        
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class,'class_teacher_subject','teacher_id','subject_id')
        ->withpivot('class_id','academic_year')
        ->withTimestamps();

    }

     public function getProfileImageUrlAttribute()
    {
        if ($this->profile_image) {
            return asset('storage/' . $this->profile_image);
        }
        return asset('storage/profile_images/teacher.jpg');
    }




}
