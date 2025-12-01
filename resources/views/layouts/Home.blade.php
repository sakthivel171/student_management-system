<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Admin Dashboard') - Student Management System</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen">


  <nav class="  bg-slate-900/90 backdrop-blur border-b border-slate-700">
    <div class=" mx-auto px-6 py-4">
      <div class="flex items-center justify-between">

        <div class="flex items-center gap-2 ">
          <div
            class="h-9 w-9 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center shadow-lg">
            <span class="font-extrabold text-white text-xl">S</span>
          </div>
          <div>
            <h1 class="text-2xl sfont-bold text-white leading-tight">
              Admin Portal
            </h1>
            <p class="text-[14px] text-slate-400 hidden sm:block">
              Student Management System
            </p>
          </div>
        </div>


        <div class="hidden md:flex items-center space-x-6">

          <!--different routes for sms -->
          <a href="{{route('admin.dashboard')}}"
            class="px-3 py-2 rounded-lg text-lg font-medium text-slate-200 bg-slate-800 shadow hover:bg-indigo-700  active:bg-indigo-700">
            Dashboard
          </a>
          <a href="{{route('admin.departments.index')}}"
            class="px-3 py-2 rounded-lg text-lg font-medium text-slate-300 hover:bg-indigo-600 hover:text-white ">
            Departments
          </a>
          <a href="{{route('admin.classes.index')}}"
            class="px-3 py-2 rounded-lg text-lg font-medium text-slate-300 hover:bg-indigo-600 hover:text-white ">
            Classes
          </a>
          <a href="{{route('admin.teachers.index')}}"
            class="px-3 py-2 rounded-lg text-lg font-medium text-slate-300 hover:bg-indigo-600 hover:text-white">
            Teachers
          </a>
          <a href="{{route('admin.students.index')}}"
            class="px-3 py-2 rounded-lg text-lg font-medium text-slate-300 hover:bg-indigo-600 hover:text-white ">
            Students
          </a>
          <a href="{{route('admin.subjects.index')}}"
            class="px-3 py-2 rounded-lg text-lg font-medium text-slate-300 hover:bg-indigo-600 hover:text-white">
            Subjects
          </a>

          <a href="{{route('admin.assignments.index')}}"
            class="px-3 py-2 rounded-lg text-lg font-medium text-slate-300 hover:bg-indigo-600 hover:text-white">
            Assignments
          </a>
        </div>

        <div class="flex items-center space-x-3">
          <!-- used to show the admin name -->
          <div class="hidden sm:flex flex-col items-end">

            <span class="text-sm font-semibold text-slate-100">
              {{ auth()->guard('admin')->user()->name }}
            </span>
            <span class="text-[11px] text-emerald-300 uppercase tracking-wide">
              Admin
            </span>
          </div>

          <!-- admin logout -->
          <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit"
              class="text-sm px-4 py-2 rounded-lg border border-red-500/70 text-red-300 hover:bg-red-500 hover:text-white hover:border-red-500 transition shadow-sm">
              Logout
            </button>
          </form>
        </div>
      </div>
    </div>
  </nav>

  </div>
  <!-- Content -->
  <div class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen px-6 mt-6">
    <!-- Content -->
    <div>
      @yield('content')
    </div>

  </div>
  </div>
  <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>