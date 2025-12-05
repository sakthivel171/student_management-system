@extends('layouts.Home')

@section('title', 'Teacher Assignments')

@section('content')

<div class="flex justify-between items-center mb-6  ">
    <div>
        <h2 class="text-3xl font-extrabold text-white tracking-wide">Teacher Assignments</h2>
        <p class="text-gray-200 mt-1">Assign teachers to classes with subjects</p>
    </div>
    <form action="{{route('admin.assignments.index')}}" method="get">
        <input type="text" name="search" id="searchInput" value="{{request('search')}}"
            class="w-[350px] text-white px-4 py-3 border-2 border-indigo-500  rounded-lg outline-0 focus:border-indigo-600 focus:border-2 focus:shadow-indigo-500/50"
            placeholder="Search... ">
           <button type="submit" class="ml-2 px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg shadow-lg hover:shadow-blue-500/50">Search</button> 
    </form>
    <a href="{{ route('admin.assignments.create') }}"
        class="px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-lg hover:shadow-blue-500/50 ">
        + Create Assignments
    </a>
</div>

<div
    class="rounded-xl backdrop-blur-md bg-white/10 border border-white/20 shadow-xl overflow-x-scroll sm:overflow-x-visible">
    <table class="w-full">
        <thead>
            <tr class="bg-indigo-600 text-center ">
                <th class="py-4 px-6 text-lg font-semibold text-gray-200">S.NO</th>
                <th class="py-4 px-6 text-lg font-semibold text-gray-200">Department</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200">Class</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200">Teacher</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200">Subject</th>
                <th class="py-4 px-6 text-lg font-semibold text-gray-200">Academic Year</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200 ">Actions</th>
            </tr>
        </thead>
        <tbody class="text-indigo-800 text-center">
            @foreach ($assignments as $assignment)
            <tr class="border-b odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                <td class="py-4 px-6 font-medium text-lg">
                    {{ ($assignments->currentPage() - 1) * $assignments->perPage() + $loop->iteration }}
                </td>

                <td class="py-2 px-4 font-bold text-xl text-indigo-600 ">{{ $assignment->department_name }}</td>
                <td class="py-2 px-4 font-medium text-lg">{{ $assignment->class_name }}</td>
                <td class="py-2 px-4  font-medium text-lg">{{ $assignment->teacher_name}}</td>
                <td class="py-2 px-4 font-medium text-lg">{{ $assignment->subject_name}}</td>
                <td class="py-2 px-4 font-medium text-lg">{{ $assignment->academic_year}}</td>
                <td class="py-2 px-4 text-center">
                    <div class="flex justify-center gap-4">

                        <!-- Delete -->
                        <form action="{{ route('admin.assignments.destroy', $assignment->id) }}" method="POST"
                            onsubmit="return confirm('Are you want to delete  ?')">
                            @csrf
                            @method('DELETE')
                            <button><ion-icon name="trash-outline" class="text-red-600 text-3xl"></ion-icon></button>
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
    {{ $assignments->links() }}
</div>
<script>
    const searchInput = document.getElementById('searchInput');
    let currentvalue=searchInput.value;
    let cursorpos=currentvalue.length;
   
    let timeout;
    searchInput.addEventListener('input',function(){
        clearTimeout(timeout);
        timeout=setTimeout(()=>{

            this.form.submit();
        },500);
    }) ;
    searchInput.focus();
    searchInput.setSelectionRange(cursorpos,cursorpos);
</script>

@endsection