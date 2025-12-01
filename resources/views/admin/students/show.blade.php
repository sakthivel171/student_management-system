@extends('layouts.Home')

@section('title', 'Student Details')

@section('content')
<div class="bg-slate-800/60 p-8 rounded-xl shadow-lg text-white w-full max-w-4xl mx-auto">


    <div class="mb-6">
        <h1 class="text-3xl font-bold text-indigo-400">{{ $student->name }}</h1>
        <p class="text-lg mt-2">
            <span class="text-slate-300 font-semibold">Roll No:</span>
            <span class="text-emerald-300">{{ $student->roll_no }}</span>
        </p>
        <p class="text-lg mt-1">
            <span class="text-slate-300 font-semibold">Email:</span>
            <span class="text-emerald-300">{{ $student->email }}</span>
        </p>
        <p class="text-lg mt-1">
            <span class="text-slate-300 font-semibold">Phone:</span>
            <span class="text-emerald-300">{{ $student->phone }}</span>
        </p>
    </div>

    

    <div class="bg-slate-900/70 border border-indigo-500/60 rounded-xl p-5 mb-6">
        <h2 class="text-xl font-semibold text-indigo-300 mb-3">Parents Details</h2>
        <p><strong class="text-green-300 mb-1">Father Name:</strong>
            {{ $student->father_name}}
        </p>
        <p><strong class="text-green-300 mb-1">Mother Name:</strong>
            {{ $student->mother_name}}
        </p>
        <p><strong class="text-green-300 mb-1">Father Occupation:</strong>
           <span class="uppercase"> {{ $student->father_occupation }}</span>
        </p>
        <p><strong class="text-green-300 mb-1">Contact:</strong>
            {{ $student->contact}}
        </p>
         <p><strong class="text-green-300 mb-1">Address:</strong>
            {{ $student->address}}
        </p>
    </div>


    <div class="bg-slate-900/70 border border-indigo-500/60 rounded-xl p-5 mb-6">
        <h2 class="text-xl font-semibold text-indigo-300 mb-3">Academic Info</h2>
        <p><strong class="text-blue-300">Class:</strong>
            {{ $student->class?->name }} - {{ $student->class?->section }}
        </p>
        <p><strong class="text-blue-300">Department:</strong>
            {{ $student->class?->department?->name }}
        </p>
        <p><strong class="text-blue-300 ">Admission No:</strong>
           <span class="uppercase"> {{ $student->admission_no }}</span>
        </p>
        <p><strong class="text-blue-300">Admission Date:</strong>
            {{ $student->admission_date}}
        </p>
    </div>

     <div class="grid grid-cols-3 gap-5 mb-6">

  
        <div class="bg-slate-900/70 border border-emerald-500/60 rounded-xl p-5 text-center">
            <h3 class="text-xs font-semibold uppercase tracking-wide text-emerald-300">Teachers</h3>
            <p class="mt-2 text-4xl font-extrabold">
                {{ $student->class?->teachers?->count() ?? 0 }}
            </p>
        </div>

        <div class="bg-slate-900/70 border border-blue-500/60 rounded-xl p-5 text-center">
            <h3 class="text-xs font-semibold uppercase tracking-wide text-blue-300">Subjects</h3>
            <p class="mt-2 text-4xl font-extrabold">
                {{ $student->class?->subjects?->count() ?? 0 }}
            </p>
        </div>


        <div class="bg-slate-900/70 border border-pink-500/60 rounded-xl p-5 text-center">
            <h3 class="text-xs font-semibold uppercase tracking-wide text-pink-300">Class Strength</h3>
            <p class="mt-2 text-4xl font-extrabold">
                {{ $student->class?->students?->count() ?? 0 }}
            </p>
        </div>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold text-emerald-400 mb-3">Handled Teachers</h2>
        <ul class="list-disc pl-6">
            @forelse($student->class?->teachers ?? [] as $teacher)
            <li>{{ $teacher->name }} ({{ $teacher->email }})</li>
            @empty
            <li class="text-slate-400">No teachers assigned yet</li>
            @endforelse
        </ul>

    <div class="mb-6">
        <h2 class="text-xl font-semibold text-blue-400 mb-3">Subjects</h2>
        <ul class="list-disc pl-6">
            @forelse($student->class?->subjects ?? [] as $subject)
            <li>{{ $subject->name }}</li>
            @empty
            <li class="text-slate-400">No subjects assigned yet</li>
            @endforelse
        </ul>
    </div>

    <div class="flex gap-5 mt-7">
        <a href="{{ route('admin.students.edit', $student->id) }}"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition">
            Edit Student
        </a>

        <a href="{{ route('admin.students.index') }}"
            class="bg-green-600 hover:bg-green-500 text-white px-6 py-3 rounded-lg font-semibold transition">
            Back To List
        </a>
    </div>

</div>
@endsection
