<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Assignmentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $assignments = DB::table('class_teacher_subject')
            ->join('classes', 'class_teacher_subject.class_id', '=', 'classes.id')
            ->join('teachers', 'class_teacher_subject.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'class_teacher_subject.subject_id', '=', 'subjects.id')
            ->join('departments', 'classes.department_id', '=', 'departments.id')
            ->select(
                'class_teacher_subject.*',
                'classes.name as class_name',
                'classes.section',
                'teachers.name as teacher_name',
                'subjects.name as subject_name',
                'subjects.code as subject_code',
                'departments.name as department_name'
            )
            ->orderBy('class_teacher_subject.created_at', 'desc')
            ->paginate(10);

        return view('admin.assignments.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::with('department')->get();
        $teachers = Teacher::with('department')->get();
        $subjects = Subject::with('department')->get();
        
        return view('admin.assignments.create', compact('classes', 'teachers', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'class_id' => 'required|exists:classes,id',
            'teacher_id' => 'required|exists:teachers,id',
            'subject_id' => 'required|exists:subjects,id',
            'academic_year' => 'required|string',
        ]);

        // Check if assignment already exists
        $exists = DB::table('class_teacher_subject')
            ->where('class_id', $request->class_id)
            ->where('teacher_id', $request->teacher_id)
            ->where('subject_id', $request->subject_id)
            ->where('academic_year', $request->academic_year)
            ->exists();

        if ($exists) {
            return back()->with('error', 'This assignment already exists');
        }

        DB::table('class_teacher_subject')->insert([
            'class_id' => $request->class_id,
            'teacher_id' => $request->teacher_id,
            'subject_id' => $request->subject_id,
            'academic_year' => $request->academic_year,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.assignments.index')
                       ->with('success', 'Teacher assigned to class successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('class_teacher_subject')->where('id', $id)->delete();
        
        return redirect()->route('admin.assignments.index')
                       ->with('success', 'Assignment removed successfully');
    }

   
}
