@extends('layouts.Home')

@section('title', 'Departments')

@section('content')

<div class="flex justify-between items-center mb-6  ">
    <div>
        <h2 class="text-3xl font-extrabold text-white tracking-wide">Departments</h2>
        <p class="text-gray-200 text-xl mt-1">Manage all department information</p>
    </div>
    <a href="{{ route('admin.departments.create') }}"
        class="px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-lg hover:shadow-blue-500/50 ">
        + Add Department
    </a>
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