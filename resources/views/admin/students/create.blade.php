@extends('layouts.Home')

@section('title', 'Create Student')

@section('content')
<div class="flex justify-center">
    <div
        class="bg-gray-200 rounded-xl shadow-lg p-10 w-full max-w-xl mt-10 border-2 border-indigo-300 shadow-indigo-100">
        <div class="mb-6 text-center">
            <h2 class="text-4xl font-bold text-indigo-600 tracking-wide">Create Student</h2>
            <p class="text-indigo-500 mt-2">Fill the form below to add a new Student</p>
        </div>

        <form method="POST" action="{{ route('admin.students.store') }}">
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
                <label for="name" class="text-lg text-indigo-700 tracking-wide">Student Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                    placeholder="Enter Student  name" required>
            </div>

                <div class="grid grid-cols-2 gap-6 mb-6">

                    <div>
                        <label for="roll_no" class="text-lg text-indigo-700 tracking-wide">Roll No</label>
                        <input type="text" id="roll_no" name="roll_no" value="{{ old('roll_no') }}"
                            class="w-full uppercase px-4 py-3 border mb-6 border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                            placeholder="eg. CSE001" required>
                    </div>
                    <div>
                        <label for="admission_no" class="text-lg text-indigo-700 tracking-wide">Admission No</label>
                        <input type="text" id="admission_no" name="admission_no" value="{{ old('admission_no') }}"
                            class="w-full uppercase px-4 py-3 border mb-6 border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                            placeholder="eg. SD001" required>
                    </div>
                </div>



            <div class="grid grid-cols-2 gap-6 mb-6">

                <div>
                    <label for="class_id" class="text-lg text-indigo-700 tracking-wide">Class</label>
                    <select name="class_id" id="class_id"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        required>
                        <option value="" disabled selected class="text-gray-200">Select Class</option>
                        @foreach($classes as $class)
                        <option value="{{ $class->id }}">
                            {{ $class->name}}-{{$class->section}}-{{$class->department->name}};
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="admission_date" class="text-lg text-indigo-700 tracking-wide">Admission Date</label>
                    <input type="date" id="admission_date" name="admission_date" value="{{ old('admission_date') }}"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        placeholder="eg. student@sms.com" required>
                </div>
            </div>

            <div>
                <label for="email" class="text-lg text-indigo-700 tracking-wide">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none mb-6 focus:border-indigo-600 focus:border-2"
                    placeholder="Enter email" required>
            </div>

            <div>
                <label for="password" class="text-lg text-indigo-700 tracking-wide">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-3 border mb-6 border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                    placeholder="Enter password" required>
            </div>


            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="phone" class="text-lg text-indigo-700 tracking-wide">Phone</label>
                    <input type="number" id="phone" name="phone" value="{{ old('phone') }}"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        placeholder="Enter Phone Number" required>
                </div>

                <div>
                    <label for="date_of_birth" class="text-lg text-indigo-700 tracking-wide">DOB</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        placeholder="Enter Phone Number" required>
                </div>
            </div>

            <div>
                <label for="address" class="text-lg text-indigo-700 tracking-wide">Address</label>
                <input type="text" id="address" name="address" value="{{ old('address') }}"
                    class="w-full px-4 py-3 border border-gray-400  mb-6 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                    placeholder="Enter Your Address" required>
            </div>


            <div class="mb-6 text-left">
                <h2 class="text-2xl font-bold text-indigo-600 tracking-wide">Parent Details</h2>
            </div>

            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="father_name" class="text-lg text-indigo-700 tracking-wide">Father Name</label>
                    <input type="text" id="father_name" name="father_name" value="{{ old('father_name') }}"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        placeholder="Enter Your Father Name" required>
                </div>

                <div>
                    <label for="father_occupation" class="text-lg text-indigo-700 tracking-wide">Father
                        Occupation</label>
                    <input type="text" id="father_occupation" name="father_occupation"
                        value="{{ old('father_occupation') }}"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        placeholder="Enter Your Father Occupation" required>
                </div>
            </div>


            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="mother_name" class="text-lg text-indigo-700 tracking-wide">Mother Name</label>
                    <input type="text" id="mother_name" name="mother_name" value="{{ old('mother_name') }}"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        placeholder="Enter Your Mother Name" required>
                </div>

                <div>
                    <label for="mother_occupation" class="text-lg text-indigo-700 tracking-wide">Mother
                        Occupation</label>
                    <input type="text" id="mother_occupation" name="mother_occupation"
                        value="{{ old('mother_occupation') }}"
                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                        placeholder="Enter Your Mother Occupation" required>
                </div>
            </div>

            <div>
                <label for="contact" class="text-lg text-indigo-700 tracking-wide">Contact</label>
                <input type="number" id="contact" name="contact" value="{{ old('contact') }}"
                    class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 focus:border-2"
                    placeholder="Enter Parent Contact Number" required>
            </div>


            <div class="flex gap-4 justify-center py-4">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 text-lg rounded-lg font-semibold transition">
                    Create Student
                </button>
                <a href="{{ route('admin.students.index') }}"
                    class="bg-green-600 hover:bg-green-500 text-white px-8 py-3 text-lg rounded-lg font-semibold transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection