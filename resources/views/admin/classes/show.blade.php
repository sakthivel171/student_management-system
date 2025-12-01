@extends('layouts.Home')

@section('title', 'Classes Details')

@section('content')
<div class="bg-slate-800/60 p-8 rounded-xl shadow-lg text-white w-full max-w-4xl mx-auto">


    <div class="mb-6">
        <h1 class="text-3xl font-bold text-indigo-400">{{ $class->name }}-{{$class->section}}</h1>
        <p class="text-lg mt-2">
            <span class="text-slate-300 font-semibold">Semester:</span>
            <span class="text-emerald-300">{{ $class->semester}}</span>
        </p>
        <p class="text-lg mt-1">
            <span class="text-slate-300 font-semibold">Academic Year:</span>
            <span class="text-emerald-300">{{ $class->academic_year ??'2024-2025' }}</span>
        </p>
    </div>


    <div class="bg-slate-900/70 border border-indigo-500/60 rounded-xl p-5 mb-6">
        <h2 class="text-xl font-semibold text-indigo-300 mb-3">Department Info</h2>
        <p><strong class="text-blue-300">Department:</strong>
            {{ $class->department?->name }}
        </p>
        <p><strong class="text-blue-300">code:</strong>
            {{ $class->department->code }}

    </div>

    <div class="grid grid-cols-3 gap-5 mb-6">


        <div class="bg-slate-900/70 border border-emerald-500/60 rounded-xl p-5 text-center">
            <h3 class="text-xs font-semibold uppercase tracking-wide text-emerald-300">Teachers</h3>
            <p class="mt-2 text-4xl font-extrabold">
                {{$class->subjects->count()}}
            </p>
        </div>


        <div class="bg-slate-900/70 border border-blue-500/60 rounded-xl p-5 text-center">
            <h3 class="text-xs font-semibold uppercase tracking-wide text-blue-300">Subjects</h3>
            <p class="mt-2 text-4xl font-extrabold">
                {{$class->teachers->count()}}
            </p>
        </div>

    </div>


    <div class="mb-6">
        <h2 class="text-xl font-semibold text-emerald-400 mb-3">Handled Staff</h2>
        <ul class="pl-6">
            @forelse($class->teachers as $teacher)
            <li class="text-slate-300">{{ $teacher->name }}- <span class="text-red-200">( {{ $teacher->email}} )</span></li>
            @empty
            <li class="text-slate-300">No classes assigned yet</li>
            @endforelse
        </ul>

        <div class="mb-6">
            <h2 class="text-xl font-semibold text-blue-400 mb-3">Subjects</h2>
            <ul class=" pl-6">
                @forelse($class->subjects as $subject)
                <li class="text-slate-300">{{ $subject->name }}- <span class="text-red-200">Sem {{$subject->semester}}</span></li>
                @empty
                <li class="text-slate-300">No subjects assigned yet</li>
                @endforelse
            </ul>
        </div>

        <div class="flex gap-5 mt-7">
            <a href="{{ route('admin.classes.edit', $class->id) }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                Edit Classes
            </a>

            <a href="{{ route('admin.classes.index') }}"
                class="bg-green-600 hover:bg-green-500 text-white px-6 py-3 rounded-lg font-semibold transition">
                Back To List
            </a>
        </div>

    </div>

    </div>
    @endsection