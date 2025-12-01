<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignmentSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Classes::all() as $class) {
            $subjects = Subject::where('department_id', $class->department_id)
                               ->where('semester', $class->semester)
                               ->get();

            $teachers = Teacher::where('department_id', $class->department_id)->get();

            foreach ($subjects as $subject) {
                DB::table('class_teacher_subject')->insert([
                    'class_id' => $class->id,
                    'subject_id' => $subject->id,
                    'teacher_id' => $teachers->random()->id,
                    'academic_year' => '2024-2025',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
