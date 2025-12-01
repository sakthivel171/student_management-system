<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'name',
        'code',
        'semester'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'class_teacher_subject', 'subject_id', 'class_id')
                    ->withPivot('teacher_id', 'academic_year')
                    ->withTimestamps();
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'class_teacher_subject', 'subject_id', 'teacher_id')
                    ->withPivot('class_id', 'academic_year')
                    ->withTimestamps();
    }
}
