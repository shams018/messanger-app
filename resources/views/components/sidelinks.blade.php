<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>side links</title>
</head>

<body>
    <div class="flex flex-col gap-4 mt-4 ml-4 items-center ">

        <div class="w-20 h-[590px] flex flex-col justify-start items-start gap-6 p-2 rounded-lg ">
            <a href="/"><img src="{{ asset('build/assets/logo.svg') }}" alt="Logo" class="w-8 h-auto"></a>
            <a href="/"><img src="{{ asset('build/assets/11.svg') }}" alt="Icon 1" class="w-8 h-auto"></a>

            <div class="w-full h-1 bg-gray-300 my-2 "></div>

            <a href="/"
                class="p-2 rounded-full hover:bg-green-500 transition duration-200 flex items-center justify-center"><img
                    src="{{ asset('build/assets/2.svg') }}" alt="Icon 2" class="w-6 h-auto"></a>
            <a href="/"
                class="p-2 rounded-full hover:bg-green-500 transition duration-200 flex items-center justify-center"><img
                    src="{{ asset('build/assets/11.png') }}" alt="Icon 3" class="w-6 h-auto"></a>
            <a href="/"><img src="{{ asset('build/assets/3.svg') }}" alt="Icon 4"
                    class="w-10 h-auto rounded-full hover:bg-green-500 transition duration-200 flex items-center justify-center"></a>
            <a href="/"><img src="{{ asset('build/assets/4.svg') }}" alt="Icon 5"
                    class="w-10 h-auto rounded-full hover:bg-green-500 transition duration-200 flex items-center justify-center"></a>
            <a href="/"><img src="{{ asset('build/assets/5.svg') }}" alt="Icon 5"
                    class="w-10 h-auto rounded-full hover:bg-green-500 transition duration-200 flex items-center justify-center"></a>
        </div>

        <div class="flex flex-col gap-4 items-center ">
            @guest
                <a href="{{ route('login') }}"
                    class="p-2 rounded-full hover:bg-blue-500 transition duration-200 flex items-center justify-center">
                    <img src="{{ asset('build/assets/Frame26.svg') }}" alt="Login" class="w-8 h-auto">
                </a>
                <a href="{{ route('register') }}"
                    class="p-2 rounded-full hover:bg-green-500 transition duration-200 flex items-center justify-center">
                    <img src="{{ asset('build/assets/Fill.svg') }}" alt="Register" class="w-4 h-auto">
                </a>
            @endguest

            @auth
                <a href="{{ url('/dashboard') }}"
                    class="p-2 rounded-full hover:bg-gray-500 transition duration-200 flex items-center justify-center">
                    <img src="{{ asset('build/assets/Frame26.svg') }}" alt="Dashboard" class="w-8 h-auto">
                </a>
                <form method="POST" action="{{ route('logout') }}"
                    class="p-2 rounded-full hover:bg-red-500 transition duration-200 flex items-center justify-center">
                    @csrf
                    <button class="w-full h-full flex items-center justify-center">
                        <img src="{{ asset('build/assets/Fill.svg') }}" alt="Logout" class="w-4 h-auto">
                    </button>
                </form>
            @endauth
        </div>

        <!-- Auth Buttons -->
        <div class="flex flex-col gap-2 items-center mt-4">
            @guest
                <a href="{{ route('login') }}"
                    class="px-3 py-2 bg-blue-500 text-white text-xs rounded hover:bg-blue-600 transition">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="px-3 py-2 bg-green-500 text-white text-xs rounded hover:bg-green-600 transition">
                    Register
                </a>
            @endguest

            @auth
                <a href="{{ url('/dashboard') }}"
                    class="px-3 py-2 bg-gray-500 text-white text-xs rounded hover:bg-gray-600 transition">
                    Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="px-3 py-2 bg-red-500 text-white text-xs rounded hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            @endauth
        </div>

    </div>
</body>

</html>
