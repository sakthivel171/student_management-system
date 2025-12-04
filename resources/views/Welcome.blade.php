<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-gray-900 via-slate-800 to-gray-900 min-h-screen flex items-center justify-center text-white ">


    <!-- Card Section -->
    <div class="relative max-w-xl w-full p-10 rounded-2xl shadow-2xl backdrop-blur-xl border border-white/10 bg-white/10 animate__animated animate__fadeIn">

        <h1 class="text-4xl font-extrabold mb-3 text-center bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-blue-500">
            Student Management System
        </h1>
        <p class="text-center text-gray-300 mb-10 text-lg tracking-wide">
            Select Your Portal to Continue
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

            <!-- Admin  login -->
            <a href="{{ route('admin.login') }}"
            class=" bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-500 hover:to-blue-700
            rounded-xl px-6 py-4 font-semibold text-center shadow-lg 
            hover:scale-105 hover:shadow-blue-500/50">
                <span class="group-hover:text-white">Admin</span>
            </a>

            <!-- Teacher login -->
            <a href="{{ route('teacher.login') }}"
            class=" bg-gradient-to-br from-green-600 to-green-800 hover:from-green-500 hover:to-green-700
            rounded-xl px-6 py-4 font-semibold text-center shadow-lg 
            hover:scale-105 hover:shadow-green-500/50">
                <span class="group-hover:text-white">Teacher</span>
            </a>

            <!-- Student  login -->
            <a href="{{ route('student.login') }}"
            class=" bg-gradient-to-br from-purple-600 to-purple-800 hover:from-purple-500 hover:to-purple-700
            rounded-xl px-6 py-4 font-semibold text-center shadow-lg
            hover:scale-105 hover:shadow-purple-500/50">
                <span class="group-hover:text-white">Student</span>
            </a>
        </div>
    </div>
</body>
</html>
