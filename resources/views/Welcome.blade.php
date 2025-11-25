<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class=" from-blue-50 to-purple-50 min-h-screen flex items-center justify-center">
    <div class="text-center">
        <h1 class="text-5xl font-bold text-gray-800 mb-4">Student Management System</h1>
        <p class="text-xl text-gray-600 mb-8">Select Your Portal</p>
        
        <div class="flex gap-6 justify-center">
            <a href="{{ route('admin.login') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-xl text-lg font-semibold transition transform hover:scale-105 shadow-lg">
                Admin Portal
            </a>
            <a href="{{ route('teacher.login') }}" 
               class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-xl text-lg font-semibold transition transform hover:scale-105 shadow-lg">
                Teacher Portal
            </a>
            <a href="{{ route('student.login') }}" 
               class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-4 rounded-xl text-lg font-semibold transition transform hover:scale-105 shadow-lg">
                Student Portal
            </a>
        </div>
    </div>
</body>
</html>