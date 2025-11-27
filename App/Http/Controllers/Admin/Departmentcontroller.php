<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Departmentcontroller extends Controller
{
    //
    public function index()
    {
        $departments = Department::withcount(['classes','teachers','subjects'])
                    ->latest()
                    ->paginate(10);
            return view('admin.departments.index',compact('departments'));
    }

    // create the department
    public function create()
    {
        return View('admin.departments.create');
    }

    // used to store the new record
    public function store(Request $request)
    {
        $request->validate([
        'name'=>'required|string|max:150',
        'code'=>'required|string|unique:departments,code',
        ]);
        
        Department::create($request->all());
        return redirect()->route('admin.departments.index')
        ->with('sucess','Department created sucessfully!');
    }

    // used to view the record
    public function show(Department $department)
    {
        $department->load(['classes','teachers','subjects']);
        return view('admin.departments.show',compact('department'));
    }

    // edit the existing record
    public function edit(Department $department)
    {
        return view('admin.departments.edit',compact('department'));
    }

    // used to update the editing record
    public function update(Request $request,Department $department)
    {
      $request->validate([
        'name'=>'required|string|max:150',
        'code'=>'required|max:10|unique:departments,code,'. $department->id
      ]);
      $department->update($request->all());
      return redirect()->route('admin.departments.index')
      ->with('success','Department updated sucessfully');

    }


    // used to delete the record
    public function destroy(Department $department)
    {
        try{
            $department->delete();
            return redirect()->route('admin.departments.index')
            ->with('sucess','Department has been deleted successfully !');
            
        }
        catch(\Exception)
        {
            return redirect()->route('admin.departments.index')
            ->with('error','cannot delete the Department Data with existing record');
        }
    }

}
