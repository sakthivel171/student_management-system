@extends('layouts.Home')

@section('title', 'Create Teacher')

@section('content')
<div class="flex justify-center">
    <div
        class="bg-gray-200 rounded-xl shadow-lg p-10 w-full max-w-xl mt-10 border-2 border-indigo-300 shadow-indigo-100">
        <div class="mb-6 text-center">
            <h2 class="text-4xl font-bold text-indigo-600 tracking-wide">Create Teacher</h2>
            <p class="text-indigo-500 mt-2">Fill the form below to add a new teacher</p>
        </div>

        <form method="POST" action="{{ route('admin.teachers.store') }}" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="mb-6">
                <label for="name" class="text-lg text-indigo-700 tracking-wide">Teacher Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                    placeholder="Enter teacher name" required>
            </div>

            <div class="mb-6">
                <label for="employee_id" class="text-lg text-indigo-700 tracking-wide">Employee ID</label>
                <input type="text" id="employee_id" name="employee_id" value="{{ old('employee_id') }}"
                    class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                    placeholder="e.g., EMP001" required>
            </div>

            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="email" class="text-lg text-indigo-700 tracking-wide">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        placeholder="Enter email" required>
                </div>

                <div>
                    <label for="phone" class="text-lg text-indigo-700 tracking-wide">Phone</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        placeholder="Enter phone number" required>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="password" class="text-lg text-indigo-700 tracking-wide">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        placeholder="Enter password" required>
                </div>

                <div>
                    <label for="department_id" class="text-lg text-indigo-700 tracking-wide">Department</label>
                    <select name="department_id" id="department_id"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        required>
                        <option value="" disabled selected class="text-gray-200">Select Department</option>
                        @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ old('department_id')==$department->id ? 'selected' : ''
                            }}>
                            {{ $department->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="qualification" class="text-lg text-indigo-700 tracking-wide">Qualification</label>
                    <input type="text" id="qualification" name="qualification" value="{{ old('qualification') }}"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        placeholder="e.g., PhD, M.Tech" required>
                </div>

                <div>
                    <label for="joining_date" class="text-lg text-indigo-700 tracking-wide">Joining Date</label>
                    <input type="date" id="joining_date" name="joining_date" value="{{ old('joining_date') }}"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        required>
                </div>

                <div class="mb-4">
                    <label for="profile_image" class="text-lg text-indigo-700 tracking-wide">profile Image</label>
                    <input type="file" name="profile_image" id="profile_image"  class="mt-1 w-full border border-indigo-400 rounded-lg px-3 py-2 b">
                @error('profile_image')
                <p class="text-red-500 text-sm mt-1">{{message}}</p>
                @enderror    
            </div>
               
            </div>

            <div class="flex gap-4 justify-center py-4">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 text-lg rounded-lg font-semibold transition">
                    Create Teacher
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