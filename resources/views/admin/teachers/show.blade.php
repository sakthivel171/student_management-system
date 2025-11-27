@extends('layouts.Home')

@section('title','Teachers Details')

@section('content')
<div>
    <h1 class="text-3xl font-bold text-white tracking-tight">{{$teacher->name}}</h1>
    <p class="text-2xl font-bold text-slate-300 mt-1">
        Department: <span class="font-semibold text-2xl text-emerald-300">{{$teacher->department->name}}</span>
    </p>
</div>


<div class="grid grid-cols-3 gap-5 text-white mt-5  mx-auto w-full ">


    <div
        class="bg-slate-900/70 border border-sky-500/60 rounded-2xl p-5 shadow-lg shadow-sky-500/10 hover:-translate-y-1 hover:shadow-sky-500/30 transition transform">
        <h2 class="text-xs font-semibold uppercase tracking-wide text-sky-300">Total Classes</h2>
        <p class="mt-3 text-4xl font-extrabold text-white">{{$teacher->classes->count()}}</p>
    </div>

    <div
        class="bg-slate-900/70 border border-emerald-500/60 rounded-2xl p-5 shadow-lg shadow-emerald-500/10 hover:-translate-y-1 hover:shadow-emerald-500/30 transition transform">
        <h2 class="text-xs font-semibold uppercase tracking-wide text-emerald-300">Total subjects</h2>
        <p class="mt-3 text-4xl font-extrabold text-white">{{$teacher->subjects->count()}}</p>
    </div>

</div>
<div class="flex gap-5 mt-7">
    <a href="{{route('admin.teachers.edit',$teacher->id)}}"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition">Edit
        Class</a>
    <a href="{{route('admin.teachers.index')}}"
        class="bg-green-600 hover:bg-green-500 text-white px-6 py-3 rounded-lg font-semibold transition">Back To
        List</a>

</div>

@endsection