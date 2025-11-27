@extends('layouts.Home')

@section('title', 'Dashboard')

@section('content')
    {{-- Main Content --}}
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-6">
                <div class="flex items-center gap-3 bg-emerald-500/10 border border-emerald-400/60 text-emerald-100 px-4 py-3 rounded-xl shadow">
                    <p class="text-sm font-medium">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        @endif

   
        <div class="mb-8 ">
            <div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                    Dashboard Overview
                </h2>
                <p class="text-sm text-slate-300 mt-1">
                    Welcome back, <span class="font-semibold text-emerald-300">Admin</span>. 
                </p>
            </div>

        </div>

       
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5">

            <div class="group bg-slate-900/70 border border-indigo-500/60 rounded-2xl p-5 shadow-lg shadow-indigo-500/10 hover:-translate-y-1 hover:shadow-indigo-500/30 transition transform">
                <p class="text-xs font-semibold uppercase tracking-wide text-indigo-300">Departments</p>
                <p class="mt-3 text-4xl font-extrabold text-white">{{ $totaldepartments }}</p>
                <p class="mt-1 text-xs text-slate-400">Total active departments</p>
            </div>

            <div class="group bg-slate-900/70 border border-sky-500/60 rounded-2xl p-5 shadow-lg shadow-sky-500/10 hover:-translate-y-1 hover:shadow-sky-500/30 transition transform">
                <p class="text-xs font-semibold uppercase tracking-wide text-sky-300">Classes</p>
                <p class="mt-3 text-4xl font-extrabold text-white">{{ $totalclasses }}</p>
                <p class="mt-1 text-xs text-slate-400">All sections & semesters</p>
            </div>

            <div class="group bg-slate-900/70 border border-emerald-500/60 rounded-2xl p-5 shadow-lg shadow-emerald-500/10 hover:-translate-y-1 hover:shadow-emerald-500/30 transition transform">
                <p class="text-xs font-semibold uppercase tracking-wide text-emerald-300">Teachers</p>
                <p class="mt-3 text-4xl font-extrabold text-white">{{ $totalteachers }}</p>
                <p class="mt-1 text-xs text-slate-400">Registered faculty members</p>
            </div>

            <div class="group bg-slate-900/70 border border-amber-500/60 rounded-2xl p-5 shadow-lg shadow-amber-500/10 hover:-translate-y-1 hover:shadow-amber-500/30 transition transform">
                <p class="text-xs font-semibold uppercase tracking-wide text-amber-300">Students</p>
                <p class="mt-3 text-4xl font-extrabold text-white">{{ $totalstudents }}</p>
                <p class="mt-1 text-xs text-slate-400">Active enrolled students</p>
            </div>

            <div class="group bg-slate-900/70 border border-rose-500/60 rounded-2xl p-5 shadow-lg shadow-rose-500/10 hover:-translate-y-1 hover:shadow-rose-500/30 transition transform">
                <p class="text-xs font-semibold uppercase tracking-wide text-rose-300">Subjects</p>
                <p class="mt-3 text-4xl font-extrabold text-white">{{ $totalsubjects }}</p>
                <p class="mt-1 text-xs text-slate-400">Academic subjects offered</p>
            </div>

        </div>
    </main>
    @endsection
</html>
