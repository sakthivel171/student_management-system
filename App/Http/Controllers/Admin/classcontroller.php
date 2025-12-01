<?php

namespace App\Http\Controllers\Admn;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Department;
use Exception;
use Illuminate\Http\Request;

class classcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $classes=Classes::with('department')
        ->latest()
        ->paginate(10);
        return view('admin.classes.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departments=Department::all();
        return view('admin.classes.create',compact('departments'));
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'department_id'=>'required|exists:departments,id',
            'name'=>'required|string|max:100',
            'section'=>'required|string|max:10',
            'semester'=>'required|integer|min:1|max:8'
        ]);
        Classes::create($request->all());
        return redirect()->route('admin.classes.index')
        ->with('success','New class created sucessfully');
    }

    /**`
     * Display the specified resource.
     */
    public function show(Classes $class)
    {
        //
        $class->load(['department','students','teachers','subjects']);
        return view('admin.classes.show',compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Classes $class)
    {
        //
        $departments=Department::all();
        return view('admin.classes.edit',compact('class','departments'));    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, classes $class)
    {
        //
        $request->validate([
            'department_id'=>'required|exists:departments,id',
            'name'=>'required|string|max:100',
            'section'=>'required|string|max:1',
            'semester'=>'required|integer|min:1|max:8',
        ]);
        $class->update($request->all());

        return redirect()->route('admin.classes.index')
        ->with('sucess','The classes Details Updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(classes $class)
    {
        //
      try{
      $class->delete();
      return redirect()->route('admin.classes.index')
    ->with('success','class Deleted sucessfully!');
      }
      catch(\Exception $e){
        return redirect()->route('admin.classes.index')
        ->with('error','cannot Delete the class record with existing data');
      }
        
    }
}
