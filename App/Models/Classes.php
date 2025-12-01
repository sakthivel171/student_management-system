<?php

namespace App\Models;

use App\Traits\UppercaseAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    //
    use HasFactory,UppercaseAttributes;
  
    protected $fillable = [
        'department_id',
        'name',
        'section',
        'semester'
    ];

    public function department()
    {
     return $this->belongsTo(Department::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class,'class_id');
    }
    public function teachers()
    {
        return $this->belongsToMany(
        Teacher::class,
        'class_teacher_subject',
        'class_id',
        'teacher_id'
        )->withPivot('subject_id','academic_year')
        ->withTimestamps();              
    }
    public function subjects()
    {
        return $this->belongsToMany(
        Subject::class,
        'class_teacher_subject',
        'class_id',
        'subject_id'
        )->withPivot('teacher_id','academic_year')
        ->withTimestamps();
    }

     public function assignments()
    {
        return $this->hasMany(ClassTeacherSubject::class, 'class_id');
    }
}
