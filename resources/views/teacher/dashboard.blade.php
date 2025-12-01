<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen text-white">

    <nav class="  bg-slate-900/50 backdrop-blur border-b border-slate-700">
        <div class=" mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-indigo-400">Teacher Portal</h1>
            <div class="flex items-center space-x-4">

                <div>
                      <img src="{{$teacher->profile_image_url}}" class="w-16 h-16  rounded-full border-indigo-400 shadow-sm" alt="{{$teacher->name}}">
                </div>
                <div class="hidden sm:flex flex-col items-end">
                    <span class="text-sm uppercase font-semibold text-slate-100">{{ $teacher->name }}</span>
                    <span class="text-[11px] px-2 mt-1 text-emerald-300 uppercase tracking-wide">
                        Staff
                    </span>
                </div>
                <form method="POST" action="{{ route('teacher.logout') }}">
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
                $teacher->name }}</h1>
            <p class="text-slate-300 text-xl mt-2">
                Employee ID: <span class="text-emerald-300">{{ $teacher->employee_id }}</span> |
            </p>

            <p class="text-xl mt-1">
                <span class="text-slate-300 font-semibold">Email:</span>
                <span class="text-emerald-300">{{ $teacher->email }}</span>
            </p>
            <p class="text-xl mt-1">
                <span class="text-slate-300 font-semibold">Phone:</span>
                <span class="text-emerald-300">{{ $teacher->phone }}</span>
            </p>
        </div>


        <div class="grid grid-cols-3 gap-5 mb-6">
            <div class="bg-slate-900/70 border border-emerald-500/60 rounded-xl p-5 text-center">
                <h3 class="text-xs font-semibold uppercase tracking-wide text-emerald-300">Department</h3>
                <p class="mt-2 text-2xl font-extrabold">{{ $teacher->department->name }}</p>
            </div>

            <div  class="bg-slate-900/70 border border-blue-500/60 rounded-xl p-5 text-center">
                <h3 class="text-xs font-semibold uppercase tracking-wide text-blue-300">Total Classes</h3>
                <p class="mt-2 text-4xl font-extrabold">{{ $assignments->count() }}</p>
            </div>

            <div class="bg-slate-900/70 border border-pink-500/60 rounded-xl p-5 text-center">
                <h3 class="text-xs font-semibold uppercase tracking-wide text-pink-300">Total Students</h3>
                <p class="mt-2 text-4xl font-extrabold">{{ $totalStudents }}</p>
            </div>
        </div>

        <div class=" rounded-xl shadow-lg p-6 ">
            <h3 class="mt-2 text-4xl font-extrabold mb-6">My Teaching Assignments</h3>

            <table class="w-full ">
                <thead>
                    <tr class= "bg-indigo-600 text-center ">
                        <th class="py-4 px-6 text-lg font-semibold text-gray-200">Classes</th>
                          <th class="py-4 px-6 text-lg font-semibold text-gray-200">Section</th>
                        <th class="py-4 px-6 text-lg font-semibold text-gray-200" >Subject</th>
                          <th class="py-4 px-6 text-lg font-semibold text-gray-200">Subject Code</th>
                        <th class="py-4 px-6 text-lg font-semibold text-gray-200">Academic Year</th>

                    </tr>
                </thead>
                <tbody class="text-indigo-800 text-center">
                    @forelse($assignments as $assignment)
                    <tr class="border-b odd:bg-blue-50 even:bg-blue-100 hover:bg-blue-200">
                        <td class="py-3 px-4 font-medium text-lg">{{ $assignment->class_name }} </td>
                          <td class="py-3 px-4 font-medium text-lg">{{ $assignment->section }}</td>
                        <td class="py-3 px-4 font-medium text-lg">{{ $assignment->subject_name }} </td>
                          <td class="py-3 px-4 font-medium text-lg">{{ $assignment->subject_code }}</td>
                        <td class="py-3 px-4 font-medium text-lg">{{ $assignment->academic_year }}</td>
                    </tr>
                    @empty
                   <tr><td  class="py-4 text-center text-gray-500">No Subject assigned yet</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>