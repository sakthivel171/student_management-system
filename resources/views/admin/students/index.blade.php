@extends('layouts.Home')

@section('title', 'Students')

@section('content')

<div class="flex justify-between items-center mb-6  ">
    <div>
        <h2 class="text-3xl font-extrabold text-white tracking-wide">Students</h2>
        <p class="text-gray-200 mt-1">Manage all Students information</p>
    </div>
    <form action="{{route('admin.students.index')}}" method="get">
        <input type="text" name="search" id="searchInput" value="{{request('search')}}"
            class="w-[350px] text-white px-4 py-3 border-2 border-indigo-500  rounded-lg outline-0 focus:border-indigo-600 focus:border-2 focus:shadow-indigo-500/50"
            placeholder="Search... ">

            <button type="submit" class="ml-2 px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg shadow-lg hover:shadow-blue-500/50">Search</button>
    </form>
    <a href="{{ route('admin.students.create') }}"
        class="px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-lg hover:shadow-blue-500/50 ">
        + Add Student
    </a>
</div>

<div class="rounded-xl backdrop-blur-md bg-white/10 border border-white/20 shadow-xl overflow-x-auto w-full">
    <div class="min-w-[1800px]">
        <table class="w-full">
            <thead>
                <tr class="bg-indigo-600 text-center">
                    <th class="py-4 px-6 text-lg font-semibold text-gray-200">SL No</th>
                    <th class="py-4 px-6 text-lg font-semibold text-gray-200">Class Name</th>
                    <th class="py-4 px-6 text-lg font-semibold text-gray-200">Admission NO</th>
                    <th class="py-4 px-6 text-lg font-semibold text-gray-200">Name</th>
                    <th class="py-4 px-6 text-lg font-semibold text-gray-200">Email</th>
                    <th class="py-4 px-6 text-lg font-semibold text-gray-200">Phone</th>
                    <th class="py-4 px-6 text-lg font-semibold text-gray-200">Roll No</th>
                    <th class="py-4 px-6 text-lg font-semibold text-gray-200">DOB</th>
                    <th class="py-4 px-6 text-lg font-semibold text-gray-200">Address</th>
                    <th class="py-4 px-6 text-lg font-semibold text-gray-200">Admission Date</th>
                    <th class="py-4 px-6 text-lg font-semibold text-gray-200">Father Name</th>
                    <th class="py-4 px-6 text-lg font-semibold text-gray-200">Mother Name</th>
                    <th class="py-4 px-6 text-lg font-semibold text-gray-200">Father Occupation</th>
                    <th class="py-4 px-6 text-lg font-semibold text-gray-200">Mother Occupation</th>
                    <th class="py-4 px-6 text-lg font-semibold text-gray-200">Contact</th>
                    <th class="py-4 px-6 text-lg font-semibold text-gray-200">Actions</th>
                </tr>
            </thead>

            <tbody class="text-indigo-800 text-center">
                @foreach ($students as $student)
                <tr class="border-b odd:bg-white even:bg-gray-100 hover:bg-gray-100 whitespace-nowrap">
                    <td class="py-4 px-6 font-medium text-lg">
                        {{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}
                    </td>

                    <td class="py-2 px-4 font-medium text-lg">{{ $student->class->name }}</td>
                    <td class="py-2 px-4 font-medium text-lg uppercase">{{ $student->admission_no }}</td>
                    <td class="py-2 px-4 font-medium text-lg">{{ $student->name }}</td>
                    <td class="py-2 px-4 font-medium text-lg">{{ $student->email }}</td>
                    <td class="py-2 px-4 font-medium text-lg">{{ $student->phone }}</td>
                    <td class="py-2 px-4 font-medium text-lg uppercase">{{ $student->roll_no }}</td>
                    <td class="py-2 px-4 font-medium text-lg">{{ $student->date_of_birth->format('d-m-Y') }}</td>
                    <td class="py-2 px-4 font-medium text-lg">{{ $student->address }}</td>
                    <td class="py-2 px-4 font-medium text-lg">{{ $student->admission_date }}</td>
                    <td class="py-2 px-4 font-medium text-lg">{{ $student->father_name }}</td>
                    <td class="py-2 px-4 font-medium text-lg">{{ $student->mother_name }}</td>
                    <td class="py-2 px-4 font-medium text-lg">{{ $student->father_occupation }}</td>
                    <td class="py-2 px-4 font-medium text-lg">{{ $student->mother_occupation }}</td>
                    <td class="py-2 px-4 font-medium text-lg">{{ $student->contact }}</td>

                    <td class="py-2 px-4 text-center">
                        <div class="flex justify-center gap-4">
                            <a href="{{ route('admin.students.show', $student->id) }}">
                                <ion-icon name="eye-outline" class="text-blue-600 text-2xl"></ion-icon>
                            </a>
                            <a href="{{ route('admin.students.edit', $student->id) }}">
                                <ion-icon name="create-outline" class="text-green-600 text-2xl"></ion-icon>
                            </a>
                            <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST"
                                onsubmit="return confirm('Are you want to delete the Student ?')">
                                @csrf @method('DELETE')
                                <button><ion-icon name="trash-outline"
                                        class="text-red-600 text-2xl"></ion-icon></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Pagination -->
<div class="mt-6 w-full flex justify-end">
    {{ $students->links() }}
</div>
<script>
    const searchInput = document.getElementById('searchInput')
    
    let currentvalue=searchInput.value;
    let cursorpos=currentvalue.length;

    searchInput.addEventListener('input',function(){
        this.form.submit();
    })
    searchInput.focus();
        searchInput.setSelectionRange(cursorpos,cursorpos);

</script>
@endsection