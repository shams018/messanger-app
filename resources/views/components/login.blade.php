<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">

                <!-- Links -->
                <div class="flex items-center gap-3">

                    @guest
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                            Login
                        </a>

                        <a href="{{ route('register') }}"
                            class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                            Register
                        </a>
                    @endguest

                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition">
                            Dashboard
                        </a>

                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                Logout
                            </button>
                        </form>
                    @endauth

                </div>
            </div>
        </div>
    </nav>



</body>

</html>
