@extends('layouts.Home')

@section('title','Class Details')

@section('content')
<div>
    <h1 class="text-3xl font-bold text-white tracking-tight">{{$class->name}}</h1>
    <p class="text-2xl font-bold text-slate-300 mt-1">
        section: <span class="font-semibold text-2xl text-emerald-300">{{$class->section}}</span>
    </p>
</div>


    <div class="grid grid-cols-3 gap-5 text-white mt-5  mx-auto w-full ">
    
        <div class="bg-slate-900/70 border border-indigo-500/60 rounded-2xl p-5 shadow-lg shadow-indigo-500/10 hover:-translate-y-1 hover:shadow-indigo-500/30 transition transform">
            <h2 class="text-xs font-semibold uppercase tracking-wide text-indigo-300">Total Classes</h2>
            <p class="mt-3 text-4xl font-extrabold text-white">{{$class->teachers->count()}}</p>
        </div>
    
        <div class="bg-slate-900/70 border border-sky-500/60 rounded-2xl p-5 shadow-lg shadow-sky-500/10 hover:-translate-y-1 hover:shadow-sky-500/30 transition transform">
            <h2 class="text-xs font-semibold uppercase tracking-wide text-sky-300">Total Teachers</h2>
            <p class="mt-3 text-4xl font-extrabold text-white">{{$class->students->count()}}</p>
        </div>
    
        <div class="bg-slate-900/70 border border-emerald-500/60 rounded-2xl p-5 shadow-lg shadow-emerald-500/10 hover:-translate-y-1 hover:shadow-emerald-500/30 transition transform">
            <h2 class="text-xs font-semibold uppercase tracking-wide text-emerald-300">Total Subjects</h2>
            <p class="mt-3 text-4xl font-extrabold text-white">{{$class->subjects->count()}}</p>
        </div>
    
    </div>
    <div class="flex gap-5 mt-7">
        <a href="{{route('admin.classes.edit',$class->id)}}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition">Edit Class</a>
        <a href="{{route('admin.classes.index')}}" class="bg-green-600 hover:bg-green-500 text-white px-6 py-3 rounded-lg font-semibold transition">Back To List</a>

    </div>

@endsection
