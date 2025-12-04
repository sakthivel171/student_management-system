<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen flex items-center justify-center">

    <section class="w-full max-w-lg p-8 rounded-2xl backdrop-blur-md bg-white/10 border border-white/20 shadow-2xl">

        <!--  Title -->
        <h1 class="text-4xl font-extrabold text-center text-indigo-400 mb-10 uppercase tracking-wide">
            Admin Login
        </h1>

        <!-- Validation Messages -->
        @if ($errors->any())
        <div class="bg-red-500/20 text-red-300 border border-red-500 px-4 py-2 mb-4 rounded-md text-center">
            {{ $errors->first() }}
        </div>
        @endif

        @if (session('success'))
        <div class="bg-green-500/20 text-green-300 border border-green-600 px-4 py-2 mb-4 rounded-md text-center">
            {{ session('success') }}
        </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-slate-200 mb-1">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" required class="w-full px-4 py-3 rounded-lg bg-slate-900/40 border border-slate-600 text-white
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-semibold text-slate-200 mb-1">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required class="w-full px-4 py-3 rounded-lg bg-slate-900/40 border border-slate-600 text-white
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Buttons -->
            <div class="pt-2 flex justify-between">
                <a href="/" class="text-sm text-indigo-300 hover:text-white underline underline-offset-4 transition">
                    Back to Home
                </a>

                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg 
                           shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/60 transition duration-200">
                    Login
                </button>
            </div>

        </form>
    </section>

</body>

</html>