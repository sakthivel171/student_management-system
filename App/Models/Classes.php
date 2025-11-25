<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Classes extends Model
{
    //
    use HasFactory;
  
    protected $fillable = [
        'name',
        'section',
        'semester'
    ];

    public function departments()
    {
     return $this->belongsTo(Department::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'create_teacher_subject')
                   ->withPivot('subject_id','academic_year')
                   ->withTimestamps();              
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class,'create_teacher_subject')
        ->withPivot('teacher_id','academic_year')
        ->withTimestamps();
    }
}
