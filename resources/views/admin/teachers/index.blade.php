@extends('layouts.Home')

@section('title', 'Teachers')

@section('content')

<div class="flex justify-between items-center mb-6  ">
    <div>
        <h2 c>Teachers</h2>
        <p class="text-gray-200 mt-1">Manage all Teachers information</p>
    </div>
    <form action="{{route('admin.teachers.index')}}" method="get">
        <input type="text" name="search" id="searchInput" value="{{request('search')}}"
         class="w-[350px] text-white px-4 py-3 border-2 border-indigo-500  rounded-lg outline-0 focus:border-indigo-600 focus:border-2 focus:shadow-indigo-500/50"
         placeholder="Search... ">

         <button type="submit" class="ml-2 px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg shadow-lg hover:shadow-blue-500/50">
            Search
         </button>
    </form>

    <a href="{{ route('admin.teachers.create') }}"
        class="px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-lg hover:shadow-blue-500/50 ">
        + Add Teacher
    </a>
</div>

<div
    class="rounded-xl backdrop-blur-md bg-white/10 border border-white/20 shadow-xl overflow-x-scroll sm:overflow-x-visible">
    <table class="w-full">
        <thead>
            <tr class="bg-indigo-600 text-center ">
                <th class="py-4 px-6 text-lg font-semibold text-gray-200">SL No</th>
                <th class="py-4 px-6 text-lg font-semibold text-gray-200">Profile</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200">Emp ID</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200">Name</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200">Email</th>
                <th class="py-4 px-6 text-lg font-semibold text-gray-200">Department</th>
                <th class="py-4 px-6 text-lg font-semibold text-gray-200">Phone</th>
                <th class="py-4 px-6 text-lg font-semibold text-gray-200">Qualification</th>
                <th class="py-4 px-6 text-lg font-semibold text-gray-200">Joining Date</th>
                <th class="py-4 px-6  text-lg font-semibold text-gray-200 ">Actions</th>
            </tr>
        </thead>
        <tbody class="text-indigo-800 text-center">
            @if($teachers->count() >0)
            @foreach ($teachers as $teacher)
            <tr class="border-b odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                <td class="py-4 px-6 font-medium text-lg">
                    {{ ($teachers->currentPage() - 1) * $teachers->perPage() + $loop->iteration }}
                </td>
                <td>
                    <img src="{{$teacher->profile_image_url}}" class="w-16 h-16 mt-2 mb-2 rounded-full border-indigo-400 shadow-sm" alt="{{$teacher->name}}">
                </td>
                <td class="py-2 px-4 font-bold text-xl text-indigo-600 ">{{ $teacher->employee_id }}</td>
                <td class="py-2 px-4 font-medium text-lg">{{ $teacher->name }}</td>
                <td class="py-2 px-4  font-medium text-lg">{{ $teacher->email }}</td>
                <td class="py-2 px-4 font-medium text-lg">{{ $teacher->department->code}}</td>
                <td class="py-2 px-4 font-medium text-lg">{{ $teacher->phone}}</td>
                <td class="py-2 px-4 font-medium text-lg">{{ $teacher->qualification}}</td>
                <td class="py-2 px-4 font-medium text-lg">{{ $teacher->joining_date->format('Y-m-d')}}</td>
                <td class="py-2 px-4 text-center">
                    <div class="flex justify-center gap-4">

                        <!-- View -->
                        <a href="{{ route('admin.teachers.show', $teacher->id) }}">
                            <ion-icon name="eye-outline" class="text-blue-600 text-2xl"></ion-icon>
                        </a>

                        <!-- Edit -->
                        <a href="{{ route('admin.teachers.edit', $teacher->id) }}">
                            <ion-icon name="create-outline" class="text-green-600 text-2xl"></ion-icon>
                        </a>

                        <!-- Delete -->
                        <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST"
                            onsubmit="return confirm('Are you want to delete the class ?')">
                            @csrf
                            @method('DELETE')
                            <button><ion-icon name="trash-outline" class="text-red-600 text-2xl"></ion-icon></button>
                        </form>

                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center text-xl font-medium text-red-500 py-4"> 
                    No Data Found
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="mt-6 w-full flex justify-end">
    {{ $teachers->links() }}
</div>

<script>
    const searchInput =document.getElementById('searchInput');
    
    let currentvalue=searchInput.value;
    let cursorpos=currentvalue.length;

    searchInput.addEventListener('input',function(){
this.form.submit();
    });
    searchInput.focus();
    searchInput.setSelectionRange(cursorpos,cursorpos);
</script>
@endsection