<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class teacherdashboardcontroller extends Controller
{
    public function index()
    {
        $teacher = auth()->guard('teacher')->user();
        
        // Get classes assigned to this teacher
        $assignments = DB::table('class_teacher_subject')
            ->join('classes', 'class_teacher_subject.class_id', '=', 'classes.id')
            ->join('subjects', 'class_teacher_subject.subject_id', '=', 'subjects.id')
            ->where('class_teacher_subject.teacher_id', $teacher->id)
            ->select(
                'classes.name as class_name',
                'classes.section',
                'subjects.name as subject_name',
                'subjects.code as subject_code',
                'class_teacher_subject.academic_year'
            )
            ->get();

        // Count total students in all assigned classes
        $classIds = DB::table('class_teacher_subject')
            ->where('teacher_id', $teacher->id)
            ->pluck('class_id')
            ->unique();

        $totalStudents = DB::table('students')
            ->whereIn('class_id', $classIds)
            ->count();

        return view('teacher.dashboard', compact('teacher', 'assignments', 'totalStudents'));
    }
}
