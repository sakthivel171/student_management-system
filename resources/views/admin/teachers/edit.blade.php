@extends('layouts.Home')

@section('title', 'Update Teacher')

@section('content')
<div class="flex justify-center">
    <div
        class="bg-gray-200 rounded-xl shadow-lg p-10 w-full max-w-xl mt-10 border-2 border-indigo-300 shadow-indigo-100">
        <div class="mb-6 text-center">
            <h2 class="text-4xl font-bold text-indigo-600 tracking-wide">Update Teacher</h2>
        </div>

        <form method="POST" action="{{ route('admin.teachers.update',$teacher->id) }}">
            @csrf
            @method('put')

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" required>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="mb-6">
                <label for="name" class="text-lg text-indigo-700 tracking-wide">Teacher Name</label>
                <input type="text" id="name" name="name" value="{{$teacher->name  }}"
                    class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                    placeholder="Enter teacher name" required>
            </div>

            <div class="mb-6">
                <label for="employee_id" class="text-lg text-indigo-700 tracking-wide">Employee ID</label>
                <input type="text" id="employee_id" name="employee_id" value="{{ $teacher->employee_id }}"
                    class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                    placeholder="e.g., EMP001" required>
            </div>

            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="email" class="text-lg text-indigo-700 tracking-wide">Email</label>
                    <input type="email" id="email" name="email" value="{{$teacher->email}}"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        placeholder="Enter email" required>
                </div>

                <div>
                    <label for="phone" class="text-lg text-indigo-700 tracking-wide">Phone</label>
                    <input type="tel" id="phone" name="phone" value="{{$teacher->phone}}"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        placeholder="Enter phone number" required>
                </div>
            </div>


            <div class="mb-6">
                <label for="department_id" class="text-lg text-indigo-700 tracking-wide">Department</label>
                <select name="department_id" id="department_id"
                    class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                    required>
                    <option value="" disabled selected class="text-gray-200">Select Department</option>
                    @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $teacher->department_id == $department->id ? 'selected' :
                        '' }}>
                        {{ $department->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="qualification" class="text-lg text-indigo-700 tracking-wide">Qualification</label>
                    <input type="text" id="qualification" name="qualification" value="{{$teacher->qualification}}"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        placeholder="e.g., PhD, M.Tech" required>
                </div>

                <div>
                    <label for="joining_date" class="text-lg text-indigo-700 tracking-wide">Joining Date</label>
                    <input type="date" id="joining_date" name="joining_date"
                        value="{{$teacher->joining_date ?$teacher->joining_date->format('Y-m-d'):''}}"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        required>
                </div>
            </div>

            <div class="flex gap-4 justify-center py-4">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 text-lg rounded-lg font-semibold transition">
                    Update
                </button>
                <a href="{{ route('admin.teachers.index') }}"
                    class="bg-green-600 hover:bg-green-500 text-white px-8 py-3 text-lg rounded-lg font-semibold transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection