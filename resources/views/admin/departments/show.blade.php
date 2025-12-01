@extends('layouts.Home')

@section('title', 'Department Details')

@section('content')
<div class="bg-slate-800/60 p-8 rounded-xl shadow-lg text-white w-full max-w-4xl mx-auto">


    <div class="mb-6">
        <h1 class="text-3xl font-bold text-indigo-400">{{ $department->name }}</h1>
        <p class="text-lg mt-2">
            <span class="text-slate-300 font-semibold">Code:</span>
            <span class="text-emerald-300">{{ $department->code }}</span>
        </p>
    </div>

     <div class="grid grid-cols-2 gap-5 mb-6">

        <div class="bg-slate-900/70 border border-emerald-500/60 rounded-xl p-5 text-center">
            <h3 class="text-xs font-semibold uppercase tracking-wide text-emerald-300">Total Classes</h3>
            <p class="mt-2 text-4xl font-extrabold">
             {{$department->classes->count()}}
            </p>
        </div>   

        <div class="bg-slate-900/70 border border-yellow-500/60 rounded-xl p-5 text-center">
            <h3 class="text-xs font-semibold uppercase tracking-wide text-yellow-300">Total Teachers</h3>
            <p class="mt-2 text-4xl font-extrabold">
             {{$department->teachers->count()}}
            </p>
        </div>


        <div class="bg-slate-900/70 border border-blue-500/60 rounded-xl p-5 text-center">
            <h3 class="text-xs font-semibold uppercase tracking-wide text-blue-300">Total Subjects</h3>
            <p class="mt-2 text-4xl font-extrabold">
              {{$department->subjects->count()}}
            </p>
        </div>


        <div class="bg-slate-900/70 border border-pink-500/60 rounded-xl p-5 text-center">
            <h3 class="text-xs font-semibold uppercase tracking-wide text-pink-300">Department Strength</h3>
            <p class="mt-2 text-4xl font-extrabold">
             {{ $department->classes->flatMap->students->count() }}
            </p>
        </div>
    </div>

    <div class="flex gap-5 mt-7">
        <a href="{{ route('admin.departments.edit', $department->id) }}"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition">
            Edit Department
        </a>

        <a href="{{ route('admin.departments.index') }}"
            class="bg-green-600 hover:bg-green-500 text-white px-6 py-3 rounded-lg font-semibold transition">
            Back To List
        </a>
    </div>

</div>
@endsection
