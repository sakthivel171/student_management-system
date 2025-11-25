<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Management System</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans  min-h-screen">

  
  <div class=" mx-auto flex bg-gray-100">
    <div>
       
        <h2 class="text-3xl  px-8 py-3 w-52 bg-yellow-400 text-white font-semibold">Akkhor</h2>
    </div>
    <div class="">
      <h1 class="text-2xl px-8 py-3  text-neutral-400"><span class="text-black px-2 font-bold">Welcome To Akkhor</span >Student Management System</h1>
    </div>
  </div>

  <!-- Sidebar + Content -->
  <div class="flex">
    <!-- Sidebar -->
    <div class=" w-44 lg:w-52 bg-[#06376e] ">
      <div class=" md:block ">
        <div>
            <button onclick="toggleDropdown(1)" class=" w-full px-6 py-4 text-gray-200 hover:text-white hover:bg-[#042954]  flex justify-between ">
                 <span>Dashboard</span>
                  <span id="arrow-1" class="transition-transform ">></span>
            </button>
            <div id="content-1" class="hidden bg-[#042954] ">
              <a href="" class="block w-full px-6 py-2 text-gray-200  hover:text-amber-300">Admin</a>
              <a href=""class="block w-full px-6 py-2 text-gray-200  hover:text-amber-300">Teachers</a>
              <a href="" class="block w-full px-6 py-2 text-gray-200  hover:text-amber-300">Students</a>
            </div>

             <button onclick="toggleDropdown(2)" class=" w-full px-6 py-4 text-gray-200 hover:text-white hover:bg-[#042954]  flex justify-between ">
                 <span>Teachers</span>
                  <span id="arrow-2" class="transition-transform">></span>
            </button>
            <div id="content-2" class="hidden bg-[#042954] ">
              <a href="" class="block w-full px-6 py-2 text-gray-200  hover:text-amber-300">All Teachers</a>
              <a href=""class="block w-full px-6 py-2 text-gray-200 hover:bg-[#042954] hover:text-amber-300">Teacher Details</a>
              <a href="" class="block w-full px-6 py-2 text-gray-200  hover:text-amber-300">Add Teacher</a>
            </div>

             <button onclick="toggleDropdown(3)" class=" w-full px-6 py-4 text-gray-200 hover:text-white hover:bg-[#042954]  flex justify-between ">
                 <span>Students</span>
                  <span id="arrow-3" class="transition-transform">></span>
            </button>
            <div id="content-3" class="hidden bg-[#042954]  ">
              <a href="" class="block w-full px-6 py-2 text-gray-200 hover:text-amber-300">All Students</a>
              <a href=""class="block w-full px-6 py-2 text-gray-200 hover:text-amber-300">Student Details</a>
              <a href="" class="block w-full px-6 py-2 text-gray-200 hover:text-amber-300">Add Student</a>
            </div>

              <button onclick="toggleDropdown(3)" class=" w-full px-6 py-4 text-gray-200 hover:text-white hover:bg-[#042954]  flex justify-between ">
                 <span>Parents</span>
                  <span id="arrow-3" class="transition-transform">></span>
            </button>
            <div id="content-3" class="hidden bg-[#042954] ">
              <a href="" class="block w-full px-6 py-2 text-gray-200 hover:text-amber-300">All Parents</a>
              <a href=""class="block w-full px-6 py-2 text-gray-200  hover:text-amber-300">Parent Details</a>
            </div>

            
              <button onclick="toggleDropdown(4)" class=" w-full px-6 py-4 text-gray-200 hover:text-white hover:bg-[#042954]  flex justify-between ">
                 <span>Attendance</span>
                  <span id="arrow-4" class="transition-transform">></span>
            </button>
            <div id="content-4" class="hidden bg-[#042954]  ">
              <a href="" class="block w-full px-6 py-2 text-gray-200  hover:text-amber-300">All Parents</a>
              <a href=""class="block w-full px-6 py-2 text-gray-200   hover:text-amber-300">Parent Details</a>
            </div>

            
              <button onclick="toggleDropdown(5)" class=" w-full px-6 py-4 text-gray-200 hover:text-white hover:bg-[#042954]  flex justify-between ">
                 <span>Exam Schedule</span>
                  <span id="arrow-5" class="transition-transform">></span>
            </button>
            <div id="content-5" class="hidden bg-[#042954]  ">
              <a href="" class="block w-full px-6 py-2 text-gray-200  hover:text-amber-300">All Parents</a>
              <a href=""class="block w-full px-6 py-2 text-gray-200  hover:text-amber-300">Parent Details</a>
            </div>
        
       </div>
       </div>
      

    </div>
    <!-- Content -->
    <div class="flex-1  min-h-screen bg-gray-200">
<!-- Content -->
     <div>
      @yield('content')
     </div>
      
    </div>
  </div>

  <script>
    function toggleDropdown(id){
        const content=document.getElementById(`content-${id}`);
        const arrow=document.getElementById(`arrow-${id}`);

        content.classList.toggle('hidden');
            arrow.style.transform=content.classList.contains("hidden")?"rotate(0deg)":"rotate(90deg)";
        
    }
    
  </script>
</body>
</html>