@extends('layouts.Home')

@section('title', 'Departments')

@section('content')

<div class="flex justify-between items-center mb-6  ">
    <div>
        <h2 class="text-3xl font-extrabold text-white tracking-wide">Departments</h2>
        <p class="text-gray-200 text-xl mt-1">Manage all department information</p>
    </div>
    <button onclick="openmodel()"
        class="px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-lg hover:shadow-blue-500/50 ">
        + Add Department
    </button>
</div>

<div class="overflow-x-scroll rounded-xl backdrop-blur-md bg-white/10 border border-white/20 shadow-xl">
    <table class="w-full">
        <thead>
            <tr class="bg-indigo-600 text-center ">
                <th class="py-4 px-6  text-lg font-semibold text-gray-200">S.No</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200">Code</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200">Name</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200">Classes</th>
                <th class="py-4 px-6 text-lg font-semibold text-gray-200">Teachers</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200">Subjects</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200 ">Actions</th>
            </tr>
        </thead>
        <tbody class="text-indigo-800 text-center">
            @foreach ($departments as $department)
            <tr class="border-b odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                <td class="py-4 px-6 font-medium text-lg">
             {{ $departments->firstItem() + $loop->index }}

                </td>

                <td class="py-4 px-6 font-bold text-xl text-indigo-600 ">{{ $department->code }}</td>
                <td class="py-4 px-6 font-medium text-lg">{{ $department->name }}</td>
                <td class="py-4 px-6  font-medium text-lg">{{ $department->classes_count }}</td>
                <td class="py-4 px-6 font-medium text-lg">{{ $department->teachers_count }}</td>
                <td class="py-4 px-6 font-medium text-lg">{{ $department->subjects_count }}</td>
                <td class="py-4 px-6 text-center">
                    <div class="flex justify-center gap-4">

                        <!-- View -->
                        <a href="{{ route('admin.departments.show', $department->id) }}">
                            <ion-icon name="eye-outline" class="text-blue-600 text-2xl"></ion-icon>
                        </a>

                        <!-- Edit -->
                        <a href="{{ route('admin.departments.edit', $department->id) }}">
                            <ion-icon name="create-outline" class="text-green-600 text-2xl"></ion-icon>
                        </a>

                        <!-- Delete -->
                        <form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST"
                            onsubmit="return confirm('Are you want to delete the department ?')">
                            @csrf
                            @method('DELETE')
                            <button><ion-icon name="trash-outline" class="text-red-600 text-2xl"></ion-icon></button>
                        </form>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="mt-6 w-full flex justify-end">
    {{ $departments->links() }}
</div>

@endsection

<div class="flex inset-0 bg-black/50 justify-center backdrop-blur-sm fixed z-10 -top-20 items-center hidden " id="createmodel">
  
    
    <div class="bg-gray-200 rounded-xl shadow-lg p-10 w-full max-w-xl mt-5 border-2 border-indigo-300  shadow-indigo-100">
        <button onclick="closemodel()"  class="text-red-600 font-bold text-2xl float-right">X</button>
        
        
        <div class="mb-6 text-center">
            <h2 class="text-4xl font-bold text-indigo-600 tracking-wide">Create Department</h2>
            <p class="text-indigo-500 mt-2">Fill the form below to add a new department</p>
        </div>
        <form method="POST" action="{{ route('admin.departments.store') }}">
            @csrf

            <!-- Validation Messages -->
            @if ($errors->any())
            <div class="bg-red-500/30 text-red-200 border border-red-500 px-4 py-3 rounded-md mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            @if (session('success'))
            <div class="bg-green-500/20 text-green-300 border border-green-600 px-4 py-2 mb-4 rounded-md text-center">
                {{ session('success') }}
            </div>
            @endif


            <div class="mb-6">
                <label for="name" class="text-lg  text-indigo-700 tracking-wide">Department Name </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full px-4 py-3 border border-gray-400 rounded-lg outline-0 focus:border-indigo-600 focus:border-2 "
                    placeholder="Ex: Computer Science" required>
            </div>

            <div class="mb-6">
                <label for="code" class="text-lg  text-indigo-700   tracking-wide">Department Code</label>
                <input type="text" id="code" name="code" value="{{ old('code') }}"
                    class="w-full px-4 py-3 border  border-gray-400 rounded-lg outline-0 focus:border-indigo-600 focus:border-2 "
                    placeholder="EX: IT,CSE ..." required>

            </div>

            <div class="flex gap-4 justify-center py-4">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 text-lg rounded-lg font-semibold transition">
                    Create
                </button>
                <button type="button" onclick="closemodel()"
                    class="bg-green-600 hover:bg-green-500 text-white px-8 py-3 text-lg rounded-lg font-semibold transition">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    function openmodel(){
        document.getElementById('createmodel').classList.remove('hidden');
    }
    function closemodel(){
        document.getElementById('createmodel').classList.add('hidden')
    }
</script>