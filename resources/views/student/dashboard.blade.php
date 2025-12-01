<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen text-white">

    <nav class="  bg-slate-900/50 backdrop-blur border-b border-slate-700">
        <div class=" mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-indigo-400">Student Portal</h1>
            <div class="flex items-center space-x-4">

                <div class="hidden sm:flex flex-col items-end">
                    <span class="text-sm uppercase font-semibold text-slate-100">{{ $student->name }}</span>
                    <span class="text-[11px] px-2 text-emerald-300 uppercase tracking-wide">
                        Student
                    </span>
                </div>
                <form method="POST" action="{{ route('student.logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-sm px-4 py-2 rounded-lg border border-red-500/70 text-red-300 hover:bg-red-500 hover:text-white hover:border-red-500 transition shadow-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-8">
        <div class="mb-6 p-5">
            <h1 class="text-3xl font-bold text-indigo-400"><span class="text-slate-300 text-4xl font-bold">Welcome
                </span>{{
                $student->name }}</h1>
            <p class="text-slate-300 text-xl mt-2">
                Roll Number: <span class="text-emerald-300">{{ $student->roll_no }}</span> |
                Class: <span class="text-emerald-300">{{ $student->class->name }} - {{ $student->class->section
                    }}</span>
            </p>

            <p class="text-xl mt-1">
                <span class="text-slate-300 font-semibold">Email:</span>
                <span class="text-emerald-300">{{ $student->email }}</span>
            </p>
            <p class="text-xl mt-1">
                <span class="text-slate-300 font-semibold">Phone:</span>
                <span class="text-emerald-300">{{ $student->phone }}</span>
            </p>
        </div>

        <div class=" text-white  p-5 mb-6 ">
            <h2 class="text-2xl font-semibold text-indigo-300 mb-3">Parents Details</h2>
             <p class="text-xl mt-1">
                <span class="text-blue-400 font-semibold">Father Name :</span>
                <span class="text-emerald-200">{{ $student->father_name}}   </span>
            </p>

             <p class="text-xl mt-1">
                <span class="text-blue-400 font-semibold">Mother Name :</span>
                <span class="text-emerald-200">{{ $student->mother_name}}   </span>
            </p>

             <p class="text-xl mt-1">
                <span class="text-blue-400 font-semibold">Father Occupation :</span>
                <span class="text-emerald-200">{{ $student->father_occupation}}   </span>
            </p>

             <p class="text-xl mt-1">
                <span class="text-blue-400 font-semibold">Mother Occupation :</span>
                <span class="text-emerald-200">{{ $student->mother_occupation}}   </span>
            </p>

            
             <p class="text-xl mt-1">
                <span class="text-blue-400 font-semibold">Contact :</span>
                <span class="text-emerald-200">{{ $student->contact}}   </span>
            </p>

            
             <p class="text-xl mt-1">
                <span class="text-blue-400 font-semibold">Address :</span>
                <span class="text-emerald-200">{{ $student->address}}   </span>
            </p>
        </div>

        <div class="grid grid-cols-3 gap-5 mb-6">
            <div class="bg-slate-900/70 border border-emerald-500/60 rounded-xl p-5 text-center">
                <h3 class="text-xs font-semibold uppercase tracking-wide text-emerald-300">Department</h3>
                <p class="mt-2 text-2xl font-extrabold">{{ $student->class->department->name }}</p>
            </div>

            <div  class="bg-slate-900/70 border border-blue-500/60 rounded-xl p-5 text-center">
                <h3 class="text-xs font-semibold uppercase tracking-wide text-blue-300">Semester</h3>
                <p class="mt-2 text-4xl font-extrabold">{{ $student->class->semester }}</p>
            </div>

            <div class="bg-slate-900/70 border border-pink-500/60 rounded-xl p-5 text-center">
                <h3 class="text-xs font-semibold uppercase tracking-wide text-pink-300">Classmates</h3>
                <p class="mt-2 text-4xl font-extrabold">{{ $totalClassmates }}</p>
            </div>
        </div>

        <div class=" rounded-xl shadow-lg p-6">
            <h3 class="mt-2 text-4xl font-extrabold mb-6">My Subjects & Teachers</h3>

            <table class="w-full ">
                <thead>
                    <tr class= "bg-indigo-600 text-center ">
                        <th class="py-4 px-6 text-lg font-semibold text-gray-200">Subject Code</th>
                        <th class="py-4 px-6 text-lg font-semibold text-gray-200" >Subject Name</th>
                        <th class="py-4 px-6 text-lg font-semibold text-gray-200">Teacher</th>
                        <th class="py-4 px-6 text-lg font-semibold text-gray-200">Teacher Email</th>
                        <th class="py-4 px-6 text-lg font-semibold text-gray-200">contact</th>
                    </tr>
                </thead>
                <tbody class="text-indigo-800 text-center">
                    @forelse($subjectsWithTeachers as $subject)
                    @foreach($subject->teachers as $teacher)
                    <tr class="border-b odd:bg-blue-50 even:bg-blue-100 hover:bg-blue-200">
                        <td class="py-3 px-4 font-medium text-lg">{{ $subject->code }}</td>
                        <td class="py-3 px-4 font-medium text-lg">{{ $subject->name }}</td>
                        <td class="py-3 px-4 font-medium text-lg">{{ $teacher->name }}</td>
                        <td class="py-3 px-4 font-medium text-lg">{{ $teacher->email }}</td>
                        <td class="py-3 px-4 font-medium text-lg">{{ $teacher->phone }}</td>
                    </tr>
                    @endforeach
                    @empty
                    <tr>
                        <td colspan="5" class="py-4 text-center text-gray-500">
                            No subjects assigned yet
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>