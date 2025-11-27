@extends('layouts.Home')

@section('title','Create Department')

@section('content')
<div class="flex justify-center ">
    <div
        class="bg-gray-200 rounded-xl shadow-lg p-10 w-full max-w-xl mt-10 border-2 border-indigo-300  shadow-indigo-100">
        <div class="mb-6 text-center">
            <h2 class="text-4xl font-bold text-indigo-600 tracking-wide">Edit Department</h2>
            <p class="text-indigo-500 mt-2">Fill the form below to Edit department</p>
        </div>
        <form method="post" action="{{ route('admin.departments.update',$department->id) }}">
            @csrf
            @method('put')

            <div class="mb-6">
                <label for="name" class="text-lg  text-indigo-700 tracking-wide">Department Name </label>
                <input type="text" id="name" name="name" value="{{ old('name',$department->name) }}"
                    class="w-full px-4 py-3 border border-gray-400 rounded-lg outline-0 focus:border-indigo-600 focus:border-2 " placeholder="Ex: Computer Science"
                    required>
            </div>

            <div class="mb-6">
                <label for="code" class="text-lg  text-indigo-700   tracking-wide">Department Code</label>
                <input type="text" id="code" name="code" value="{{ old('code',$department->code) }}"
                    class="w-full px-4 py-3 border  border-gray-400 rounded-lg outline-0 focus:border-indigo-600 focus:border-2 " placeholder="EX: IT,CSE ..."
                    required>
          
            </div>

            <div class="flex gap-4 justify-center py-4">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 text-lg rounded-lg font-semibold transition">
                    update
                </button>
                <a href="{{ route('admin.departments.index') }}"
                    class="bg-green-600 hover:bg-green-500 text-white px-8 py-3 text-lg rounded-lg font-semibold transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection