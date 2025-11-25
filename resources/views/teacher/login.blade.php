<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
      @vite(['resources/css/app.css', 'resources/js/app.js'])
<body>
           <section class="flex justify-center items-center min-h-screen bg-blue-50">
    <div class="w-full max-w-lg bg-white shadow-xl rounded-xl p-10 border border-gray-200 relative">
        <!-- 🔹 Page Heading (at top of form) -->
        <h1 class="text-3xl font-extrabold text-blue-700 text-center mb-8 uppercase tracking-wide">
         Teacher Login
        </h1>
        
            @if ($errors->any())
            <p style="color:red">{{ $errors->first() }}</p>
            @endif

            @if (session('success'))
            <p style="color:green">{{ session('success') }}</p>
            @endif
        

        <!-- 🔹 Form -->
        <form action="{{ route('teacher.login.post') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email"
                    placeholder="Enter your email"
                    required value=""
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password"
                    placeholder="Enter your password"
                    required  value=""
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button 
                    type="submit"
                    class=" bg-green-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700 transition duration-200">
                    login
                </button>
            </div>

        </form>
    </div>
</section>
</body>
</html>