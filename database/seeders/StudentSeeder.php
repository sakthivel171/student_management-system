<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Classes::all() as $class){
            Student::factory()->count(6)->create([
                'class_id' => $class->id
            ]);
        }
    }
}
