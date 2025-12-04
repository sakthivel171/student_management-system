<?php

use App\Http\Controllers\Admin\Assignmentcontroller;
use App\Http\Controllers\Admin\authcontroller;
use App\Http\Controllers\Admin\dashboardcontroller;
use App\Http\Controllers\Admin\Departmentcontroller;
use App\Http\Controllers\Admin\Studentcontroller;
use App\Http\Controllers\Admin\Subjectscontroller;
use App\Http\Controllers\Admin\Teachercontroller;
use App\Http\Controllers\Admn\classcontroller;
use App\Http\Controllers\Student\studentAuthcontroller;
use App\Http\Controllers\Student\StudentDashboardController as StudentStudentDashboardController;
use App\Http\Controllers\Teacher\teacherAuthcontroller;
use App\Http\Controllers\Teacher\teacherdashboardcontroller;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


// Admin Login Routes (Public)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [authcontroller::class, 'showLoginForm'])->name('login');
    Route::post('login', [authcontroller::class, 'login'])->name('login.post');
});


// Admin Protected Routes
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::post('logout', [authcontroller::class, 'logout'])->name('logout');
    Route::get('dashboard', [dashboardcontroller::class, 'index'])->name('dashboard');

    Route::resource('departments', Departmentcontroller::class);

    Route::resource('classes', classcontroller::class);

    Route::resource('teachers', Teachercontroller::class);

    Route::resource('students', Studentcontroller::class);

    Route::resource('subjects', Subjectscontroller::class);


    // Assignment Routes (Teacher-Class-Subject assignments)
    Route::prefix('assignments')->name('assignments.')->group(function () {
        Route::get('/', [AssignmentController::class, 'index'])->name('index');
        Route::get('create', [AssignmentController::class, 'create'])->name('create');
        Route::post('/', [AssignmentController::class, 'store'])->name('store');
        Route::delete('{id}', [AssignmentController::class, 'destroy'])->name('destroy');
    });
});




// Teacher Login Routes (Public)
Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::get('login', [teacherAuthcontroller::class, 'showLoginForm'])->name('login');
    Route::post('login', [teacherAuthcontroller::class, 'login'])->name('login.post');
});


Route::prefix('teacher')->name('teacher.')->middleware('teacher')->group(function () {
    Route::post('logout', [teacherAuthcontroller::class, 'logout'])->name('logout');
    Route::get('dashboard', [teacherdashboardcontroller::class, 'index'])->name('dashboard');
});




// Student Login Routes (Public)
Route::prefix('student')->name('student.')->group(function () {
    Route::get('login', [studentAuthcontroller::class, 'showLoginForm'])->name('login');
    Route::post('login', [studentAuthcontroller::class, 'login'])->name('login.post');
});


Route::prefix('student')->name('student.')->middleware('student')->group(function () {
    Route::post('logout', [studentAuthcontroller::class, 'logout'])->name('logout');
    Route::get('dashboard', [StudentStudentDashboardController::class, 'index'])->name('dashboard');
});
