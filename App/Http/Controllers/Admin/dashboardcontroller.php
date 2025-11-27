<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Department;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    //
    public function index()
    {
        $data=[
            'totaldepartments' =>Department::count(),
            'totalclasses'=>Classes::count(),
            'totalteachers'=>Teacher::count(),
            'totalstudents'=>Student::count(),
            'totalsubjects'=>Subject::count(),
        
        ];
 
       return view('admin.dashboard', $data);
    }
}
