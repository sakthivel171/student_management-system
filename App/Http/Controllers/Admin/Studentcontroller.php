<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Studentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $students = Student::with('class.department')
        ->when($request->search,function($query) use ($request){
            $search =$request->search;

            $query->where(function ($subquery) use ($search) {
                $subquery->where('name','like',"%$search%")
                ->orWhere('email','like',"%$search%")
                ->orWhere('phone','like',"%$search%")
                ->orWhere('address','like',"%$search%")
                ->orWhere('admission_no','like',"%$search%")
                ->orWhere('father_name','like',"%$search%")
                ->orWhere('mother_name','like',"%$search%")
                ->orWhere('father_occupation','like',"%$search%")
                ->orWhere('mother_occupation','like',"%$search%");
            })
            ->orWhereHas('class.department',function ($q) use ($search){
                $q->where('name','like',"%$search%");
            });
        })
            ->orderby('id', 'asc')
            ->paginate(10);

        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classes = Classes::with('department')->get();
        return view('admin.students.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'class_id'          => 'required|exists:classes,id',
            'admission_no'      => 'required|string|unique:students,admission_no',
            'name'              => 'required|string|max:150',
            'email'             => 'required|email|unique:students,email',
            'password'          => 'required|min:4',
            'phone'             => 'required|digits_between:10,15',
            'roll_no'           => 'required|unique:students,roll_no',
            'date_of_birth'     => 'required|date',
            'address'           => 'required|string|max:250',
            'admission_date'    => 'required|date',
            'father_name'       => 'required|string|max:150',
            'mother_name'       => 'required|string|max:150',
            'father_occupation' => 'required|string|max:150',
            'mother_occupation' => 'required|string|max:150',
            'contact'           => 'required|digits_between:10,15',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        Student::create($data);

        return redirect()->route('admin.students.index')
            ->with('success', 'New Student Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
        $student->load(['class.department', 'class.teachers', 'class.subjects']);
        return view('admin.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $classes = classes::with('department')->get();
        return view('admin.students.edit', compact('student', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
       $request->validate([
    'class_id'          => 'required|exists:classes,id',
    'name'              => 'required|string|max:150',
    'admission_no'      => 'required|string|unique:students,admission_no,' . $student->id,
    'email'             => 'required|email|unique:students,email,' . $student->id,
    'phone'             => 'required|digits_between:10,15',
    'roll_no'           => 'required|unique:students,roll_no,' . $student->id,
    'date_of_birth'     => 'required|date',
    'address'           => 'required|string|max:250',
    'father_name'       => 'required|string|max:150',
    'mother_name'       => 'required|string|max:150',
    'father_occupation' => 'required|string|max:150',
    'mother_occupation' => 'required|string|max:150',
]);

        $data = $request->all();
        $student->update($data);
        return redirect()->route('admin.students.index')
            ->with('success', 'Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index')
            ->with('success', 'Student Deleted Sucessfully');
    }
}
