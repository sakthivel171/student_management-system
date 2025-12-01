<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Teachercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teachers=Teacher::with('department')
         ->orderBy('employee_id', 'asc')
        ->paginate(10);
        return view('admin.teachers.index',compact('teachers'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departments=Department::all();
        return view('admin.teachers.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
         'department_id'=>'required|exists:departments,id',
         'name'=>'required|string|max:150',
         'email'=>'required|email|unique:teachers,email',
         'password'=>'required',
         'phone'=>'required|string|digits_between:10,15',
         'employee_id'=>'required|string|unique:teachers,employee_id',
         'qualification'=>'required|string|max:150',
         'joining_date'=>'required|date',
         'profile_image'=>'nullable|image|mimes:jpg,png,gif,jpeg|max:2048'

        ]);
        $data =$request->all();
        $data['password']=Hash::make($request->password);

        if($request->hasFile('profile_image'))
        {
            $image=$request->file('profile_image');
            $path=$image->store('profile_images','public');
            $data['profile_image']= $path;
        }

        Teacher::create($data);
        return redirect()->route('admin.teachers.index')
        ->with('success','Teachers created sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
        $teacher->load(['department','classes','subjects']);
        return view('admin.teachers.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
        $departments=Department::all();
        return view('admin.teachers.edit',compact('teacher','departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
          $request->validate([
         'department_id'=>'required|exists:departments,id',
         'name'=>'required|string|max:150',
         'email'=>'required|email|unique:teachers,email,'. $teacher->id,
         'phone'=>'required|integer|digits_between:10,15',
         'employee_id'=>'required|string|unique:teachers,employee_id,'. $teacher->id,
         'qualification'=>'required|string|max:150',
         'joining_date'=>'required|date',
         'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',

        ]);
        $data = $request->all();

        if($request->filled('password'))
        {
            $data['password']=Hash::make($request->password);
        }
        else{
            unset($data['password']);
        }


    if ($request->hasFile('profile_image')) {

        if ($teacher->profile_image && Storage::disk('public')->exists($teacher->profile_image)) {
            Storage::disk('public')->delete($teacher->profile_image);
        }

        $image = $request->file('profile_image');
        $path = $image->store('profile_images', 'public');
        $data['profile_image'] = $path;
    }
        $teacher->update($data);

        return redirect()->route('admin.teachers.index')
        ->with('success','Teacher updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
        $teacher->delete();
        return redirect()->route('admin.teachers.index')
        ->with('sucess','Teacher Deleted Suessfully');
    }
}
