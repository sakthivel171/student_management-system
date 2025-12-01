@extends('layouts.Home')

@section('title', 'Subject Details')

@section('content')
<div class="bg-slate-800/60 p-8 rounded-xl shadow-lg text-white w-full max-w-4xl mx-auto">

    <h1 class="text-4xl font-bold text-indigo-400 mb-4">{{ $subject->name }}</h1>

    <p class="text-lg">
        <span class="text-slate-300 font-semibold">Code: </span>
        <span class="text-emerald-300">{{ $subject->code }}</span>
    </p>

    <p class="text-lg mt-1">
        <span class="text-slate-300 font-semibold">Department: </span>
        <span class="text-emerald-300">{{ $subject->department?->name ?? 'N/A' }}</span>
    </p>

    <div class="grid grid-cols-2 gap-5 mt-6">

        <div class="bg-slate-900/70 border border-blue-500/70 rounded-xl p-5 text-center">
            <h3 class="text-xs font-semibold uppercase tracking-wider text-blue-300"> Classes</h3>
            <p class="text-3xl font-extrabold mt-2">
                {{ $subject->classes?->count() ?? 0 }}
            </p>
        </div>

        <div class="bg-slate-900/70 border border-emerald-500/70 rounded-xl p-5 text-center">
            <h3 class="text-xs font-semibold uppercase tracking-wider text-emerald-300"> Teachers</h3>
            <p class="text-3xl font-extrabold mt-2">
                {{ $subject->teachers?->count() ?? 0 }}
            </p>
        </div>

    </div>

    <div class="mt-8">
        <h2 class="text-xl font-semibold text-blue-400 mb-3">Classes Assigned</h2>
        <ul class="list-disc pl-6">
            @forelse ($subject->classes as $class)
                <li>{{ $class->name }} - {{ $class->section }} ({{ $class->department?->name }})</li>
            @empty
                <li class="text-slate-400">Not assigned to any class</li>
            @endforelse
        </ul>
    </div>

    <div class="mt-6">
        <h2 class="text-xl font-semibold text-emerald-400 mb-3">Teachers Assigned</h2>
        <ul class="list-disc pl-6">
            @forelse ($subject->teachers as $teacher)
                <li>{{ $teacher->name }} ({{ $teacher->email }})</li>
            @empty
                <li class="text-slate-400">No teachers assigned yet</li>
            @endforelse
        </ul>
    </div>

    <div class="flex gap-5 mt-10">
        <a href="{{ route('admin.subjects.edit', $subject->id) }}"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition">
            Edit Subject
        </a>

        <a href="{{ route('admin.subjects.index') }}"
            class="bg-gray-600 hover:bg-gray-500 text-white px-6 py-3 rounded-lg font-semibold transition">
            Back To List
        </a>
    </div>

</div>
@endsection
