<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentDashboardController extends Controller
{
    public function index()
    {
        // Get authenticated student
        $student = auth()->guard('student')->user();

        // Load class and department using relationships
        $student->load(['class.department']);

        // Get subjects with teachers using Eloquent relationship
        $subjectsWithTeachers = $student->class->subjects()
            ->with('teachers') 
            ->get();

        // Count classmates (excluding current student)
        $totalClassmates = Student::where('class_id', $student->class_id)
            ->where('id', '!=', $student->id)
            ->count();

        return view('student.dashboard', compact('student', 'subjectsWithTeachers', 'totalClassmates'));
    }
}
