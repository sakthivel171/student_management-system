@extends('layouts.Home')

@section('title', 'Subjectss')

@section('content')

<div class="flex justify-between items-center mb-6  ">
    <div>
        <h2 class="text-3xl font-extrabold text-white tracking-wide">Subjects</h2>
        <p class="text-gray-200 mt-1">Manage all Subjects information</p>
    </div>
    <a href="{{ route('admin.subjects.create') }}"
        class="px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-lg hover:shadow-blue-500/50 ">
        + Add Subject
    </a>
</div>

<div
    class="rounded-xl backdrop-blur-md bg-white/10 border border-white/20 shadow-xl overflow-x-scroll sm:overflow-x-visible">
    <table class="w-full">
        <thead>
            <tr class="bg-indigo-600 text-center ">
                <th class="py-4 px-6 text-lg font-semibold text-gray-200">SL No</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200">Department ID</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200"> Subject Name</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200">Subject code</th>
                <th class="py-4 px-6 text-lg font-semibold text-gray-200">Semester</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200 ">Actions</th>
            </tr>
        </thead>
        <tbody class="text-indigo-800 text-center">
            @foreach ($subjects as $subject)
            <tr class="border-b odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                <td class="py-4 px-6 font-medium text-lg">
                    {{ ($subjects->currentPage() - 1) * $subjects->perPage() + $loop->iteration }}
                </td>

                <td class="py-2 px-4 font-bold text-xl text-indigo-600 ">{{ $subject->department_id }}</td>
                <td class="py-2 px-4 font-medium text-lg">{{ $subject->name }}</td>
                <td class="py-2 px-4  font-medium text-lg">{{ $subject->code}}</td>
                <td class="py-2 px-4 font-medium text-lg">{{ $subject->semester}}</td>
                <td class="py-2 px-4 text-center">
                    <div class="flex justify-center gap-4">

                        <!-- View -->
                        <a href="{{ route('admin.subjects.show', $subject->id) }}">
                            <ion-icon name="eye-outline" class="text-blue-600 text-2xl"></ion-icon>
                        </a>

                        <!-- Edit -->
                        <a href="{{ route('admin.subjects.edit', $subject->id) }}">
                            <ion-icon name="create-outline" class="text-green-600 text-2xl"></ion-icon>
                        </a>

                        <!-- Delete -->
                        <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST"
                            onsubmit="return confirm('Are you want to delete the class ?')">
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
    {{ $subjects->links() }}
</div>

@endsection