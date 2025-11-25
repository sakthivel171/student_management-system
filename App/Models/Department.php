<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];
    public function classes()
    {
        return $this->hasMany(Classes::class);
    }
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
    public function subjects()
    {
        return $this->hasmany(Subject::class);
    }
}
