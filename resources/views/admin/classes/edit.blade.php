@extends('layouts.Home')

@section('title','Edit Classes')

@section('content')
<div class="flex justify-center ">
    <div
        class="bg-gray-200 rounded-xl shadow-lg p-10 w-full max-w-xl mt-10 border-2 border-indigo-300  shadow-indigo-100">
        <div class="mb-6 text-center">
            <h2 class="text-4xl font-bold text-indigo-600 tracking-wide">Edit Class</h2>
        </div>
        <form method="POST" action="{{ route('admin.classes.update',$class->id) }}">
            @csrf
            @method('put')
            @if ($errors->any())
            <div class="text-red-600">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
            <div>
                <label for="dropdown" class="text-lg  text-indigo-700 tracking-wide">Department</label>
                <select name="department_id" id="dropdown" required
                    class="w-full px-4 py-3 border border-gray-400 rounded-lg outline-0 focus:border-indigo-600 focus:border-2 ">
                    <option value="" disabled selected class="text-gray-400">Select Department</option>
                    @foreach($departments as $department)
                    <option value="{{$department->id}}" {{ $class->department_id == $department->id ? 'selected' : '' }}  >{{$department->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="name" class="text-lg  text-indigo-700 tracking-wide">Class Name </label>
                <input type="text" id="name" name="name" value="{{ $class->name }}"
                    class="w-full uppercase px-4 py-3 border border-gray-400 rounded-lg outline-0 focus:border-indigo-600 focus:border-2 "
                    placeholder="e.g., CSE - Year 1" required>
            </div>

            <div class="flex gap-3">
                <div>
                    <label for="section" class="text-lg  text-indigo-700   tracking-wide">Section</label>
                    <input type="text" id="section" name="section" value="{{ $class->section }}"
                        class="w-full px-4 py-3 border  border-gray-400 rounded-lg outline-0 focus:border-indigo-600 focus:border-2 "
                        placeholder="EX:A,B,C ..." required>
                </div>
                <div>
                    <label for="semester" class="text-lg  text-indigo-700   tracking-wide">Semester</label>
                    <input type="text" id="semester" name="semester" value="{{$class->semester}}"
                        class="w-full px-4 py-3 border  border-gray-400 rounded-lg outline-0 focus:border-indigo-600 focus:border-2 "
                        placeholder="EX:1,2,3..." required>

                </div>

            </div>

            <div class="flex gap-4 justify-center py-4">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 text-lg rounded-lg font-semibold transition">
                    Update
                </button>
                <a href="{{ route('admin.classes.index') }}"
                    class="bg-green-600 hover:bg-green-500 text-white px-8 py-3 text-lg rounded-lg font-semibold transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection