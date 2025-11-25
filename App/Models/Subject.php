<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Subject extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'department_id',
        'name',
        'code',
        'semester'
    ];
    

    public function department()
    {
        return $this->belongsTo(department::class);
    }
    
    public function classes()
    {
        return $this->belongsToMany(Classes::class,'class_teacher_subject')
        ->withPivot('teacher_id','academic_year')
        ->withTimestamps();
    }

    public function teacher()
    {
        return $this->belongsToMany(Teacher::class,'create_teacher_sbject')
        ->withpivot('class_id','academic_year')
        ->withTimestamps();
    }
    
}
