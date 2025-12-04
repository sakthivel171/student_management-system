@extends('layouts.Home')
@section('title', 'Create Assignment')
@section('content')
<div class="flex justify-center px-8">
    <div
        class="bg-gray-200 rounded-xl shadow-lg p-10 w-full max-w-xl mt-10 border-2 border-indigo-300  shadow-indigo-100 mb-5">
        <div class="mb-5+- text-center">
            <h2 class="text-4xl font-bold text-indigo-600 tracking-wide">Create Teacher Assignment</h2>
            <p class="text-indigo-500 mt-2">Assign a teacher to teach a   subject in a class</p>
        </div>


        <form method="POST" action="{{ route('admin.assignments.store') }}">
            @csrf
            <div class="mb-7">
                <label for="class_id" class="text-lg  text-indigo-700 tracking-wide">Class </label>
                <select name="class_id" id="class_id"
                    class="w-full px-4 py-3 border border-gray-400 rounded-lg outline-0 focus:border-indigo-600 focus:border-2 "
                    required>
                    <option value="" selected disabled >Select Class</option>
                    @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }} - {{ $class->section }} 
                        ({{$class->department->name }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-7">
                <label for="teacher_id" class="text-lg  text-indigo-700 tracking-wide">Teacher </label>
                <select name="teacher_id" id="teacher_id"
                    class="w-full px-4 py-3 border border-gray-400 rounded-lg  focus:border-indigo-600 focus:border-2 "
                    required>
                    <option value="" selected disabled>Select Teacher</option>
                    @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }} ({{ $teacher->employee_id }}) - {{
                        $teacher->department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="subject_id" class="text-lg  text-indigo-700 tracking-wide">Subject *</label>
                <select name="subject_id" id="subject_id"
                    class="w-full px-4 py-3 border border-gray-400 rounded-lg  focus:border-indigo-600 focus:border-2  "
                    required>
                    <option value="" selected disabled>Select Subject</option>
                    @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }} ({{ $subject->code }}) - {{
                        $subject->department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label class="text-lg  text-indigo-700 tracking-wide">Academic Year *</label>
                <input type="text" name="academic_year" value="2024-2025" placeholder="e.g., 2024-2025"
                    class="w-full px-4 py-3 border border-gray-400 rounded-lg  focus:border-indigo-600 focus:border-2 "
                    required>
            </div>
            <div class="flex gap-4 justify-center py-4  ">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 text-lg rounded-lg font-semibold transition">Create
                    Assignment</button>
                <a href="{{ route('admin.assignments.index') }}"
                    class="bg-green-600 hover:bg-green-500 text-white px-8 py-3 text-lg rounded-lg font-semibold transition">
                    Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
