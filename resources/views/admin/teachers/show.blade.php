@extends('layouts.Home')

@section('title', 'Teacher Details')

@section('content')
<div class="bg-slate-800/60 p-8 rounded-xl shadow-lg text-white w-full max-w-4xl mx-auto">
    <div class="flex gap-8">
        <div>
            <img src="{{$teacher->profile_image_url}}" class="w-32 h-32 rounded-full border-2 border-indigo-600 shadow-lg shadow-indigo-500"
                alt="{{$teacher->name}}">
        </div>


        <div class="mb-6">
            <h1 class="text-3xl font-bold uppercase text-indigo-400">{{ $teacher->name }}</h1>
            <p class="text-lg mt-2">
                <span class="text-slate-300 font-semibold">Employee Id:</span>
                <span class="text-emerald-300">{{ $teacher->employee_id }}</span>
            </p>
            <p class="text-lg mt-1">
                <span class="text-slate-300 font-semibold">Email:</span>
                <span class="text-emerald-300">{{ $teacher->email }}</span>
            </p>
            <p class="text-lg mt-1">
                <span class="text-slate-300 font-semibold">Phone:</span>
                <span class="text-emerald-300">{{ $teacher->phone }}</span>
            </p>
        </div>
    </div>


    <div class="bg-slate-900/70 border border-indigo-500/60 rounded-xl p-5 mb-6">
        <h2 class="text-xl font-semibold text-indigo-300 mb-3">Department Info</h2>
        <p><strong class="text-blue-300">Department:</strong>
            {{ $teacher->department?->name }}
        </p>
        <p><strong class="text-blue-300">code:</strong>
            {{ $teacher->department?->code }}

    </div>

    <div class="grid grid-cols-3 gap-5 mb-6">


        <div class="bg-slate-900/70 border border-emerald-500/60 rounded-xl p-5 text-center">
            <h3 class="text-xs font-semibold uppercase tracking-wide text-emerald-300">Total Handled Classes</h3>
            <p class="mt-2 text-4xl font-extrabold">
                {{$teacher->classes->count()}}
            </p>
        </div>

        {{-- Total Subjects --}}
        <div class="bg-slate-900/70 border border-blue-500/60 rounded-xl p-5 text-center">
            <h3 class="text-xs font-semibold uppercase tracking-wide text-blue-300">Total Handled Subjects</h3>
            <p class="mt-2 text-4xl font-extrabold">
                {{$teacher->subjects->count()}}
            </p>
        </div>


        <div class="bg-slate-900/70 border border-pink-500/60 rounded-xl p-5 text-center">
            <h3 class="text-xs font-semibold uppercase tracking-wide text-pink-300">Total Class Strength</h3>
            <p class="mt-2 text-4xl font-extrabold">
                {{ $teacher->classes->flatMap->students->count() }}
            </p>
        </div>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold text-emerald-400 mb-3">Handled classes</h2>
        <ul class=" pl-6">
            @forelse($teacher->classes as $class)
            <li>• {{ $class->name }} ({{ $class->section }})</li>
            @empty
            <li class="text-slate-400">No classes assigned yet</li>
            @endforelse
        </ul>

        <div class="mb-6">
            <h2 class="text-xl font-semibold text-blue-400 mb-3">Handled Subjects</h2>
            <ul class=" pl-6">
                @forelse($teacher->subjects as $subject)
                <li>• {{ $subject->name }}-Sem {{$subject->semester}}</li>
                @empty
                <li class="text-slate-400">No subjects assigned yet</li>
                @endforelse
            </ul>
        </div>

        <div class="flex gap-5 mt-7">
            <a href="{{ route('admin.teachers.edit', $teacher->id) }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                Edit Teacher
            </a>

            <a href="{{ route('admin.teachers.index') }}"
                class="bg-green-600 hover:bg-green-500 text-white px-6 py-3 rounded-lg font-semibold transition">
                Back To List
            </a>
        </div>

    </div>
    @endsection