@extends('layouts.Home')

@section('title','Create Subject')

@section('content')
<div class="flex justify-center px-8 ">
    <div
        class="bg-gray-200 rounded-xl shadow-lg p-10 w-full max-w-xl mt-10 border-2 border-indigo-300  shadow-indigo-100">
        <div class="mb-6 text-center">
            <h2 class="text-4xl font-bold text-indigo-600 tracking-wide">Create Subjects</h2>
            <p class="text-indigo-500 mt-2">Fill the form below to add a new subject</p>
        </div>
        <form method="POST" action="{{ route('admin.subjects.store') }}">
            @csrf

            <div class="mb-6">
                <label for="department_id" class="text-lg  text-indigo-700 tracking-wide">Department id </label>
                <input type="text" id="department_id" name="department_id" value="{{ old('department_id') }}"
                    class="w-full px-4 py-3 border border-gray-400 rounded-lg outline-0 focus:border-indigo-600 focus:border-2 "
                   placeholder="EX:1,2,3..." required>
            </div>

             <div class="mb-6">
                <label for="name" class="text-lg  text-indigo-700   tracking-wide">Subject Name</label>
                <input type="text" id="name" name="code" value="{{ old('name') }}"
                    class="w-full px-4 py-3 border  border-gray-400 rounded-lg outline-0 focus:border-indigo-600 focus:border-2 "
                    placeholder="EX:FSWD	..." required>
            </div>

            <div class="mb-6">
                <label for="code" class="text-lg  text-indigo-700   tracking-wide">Subject Code</label>
                <input type="text" id="code" name="code" value="{{ old('code') }}"
                    class="w-full px-4 py-3 border  border-gray-400 rounded-lg outline-0 focus:border-indigo-600 focus:border-2 "
                    placeholder="EX:CS101	..." required>
            </div>

            
            <div class="mb-6">
                <label for="semester" class="text-lg  text-indigo-700   tracking-wide">Semester</label>
                <input type="number" id="semester" name="semester" value="{{ old('semester') }}"
                    class="w-full px-4 py-3 border  border-gray-400 rounded-lg outline-0 focus:border-indigo-600 focus:border-2 "
                    placeholder="EX:1,2,3..." required>
            </div>


            <div class="flex gap-4 justify-center py-4">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 text-lg rounded-lg font-semibold transition">
                    Create
                </button>
                <a href="{{ route('admin.subjects.index') }}"
                    class="bg-green-600 hover:bg-green-500 text-white px-8 py-3 text-lg rounded-lg font-semibold transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection