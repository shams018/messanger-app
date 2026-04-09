<div class="flex w-full h-[calc(100vh-70px)] ">

    <div class="hidden md:flex w-[293px] h-[728px] bg-gray-100 flex-col items-start gap-2 px-6 py-4">

        <p class="text-[20px] font-bold text-black mb-2 mt-2 ">
            Messages
        </p>
        <form action="{{ route('messages.index') }}" method="GET"
            class="w-[223px] h-[40px] px-4 rounded-lg bg-gray-200 flex items-center gap-2">
            <button type="submit">
                <img src="{{ asset('build/assets/Shape.svg') }}" alt="Search icon" class="w-3 h-3">
            </button>

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search"
                class="bg-transparent w-full text-sm text-gray-700 border-none outline-none focus:ring-0 focus:outline-none">
        </form>

        <div class="flex flex-row gap-2 items-center ">
            <button>
                Sort by
            </button>
            <div x-data="{ open: false }" class="relative inline-block text-left">
                <!-- Button -->
                <div class="flex items-center gap-1 cursor-pointer" @click="open = !open">
                    <button class="text-[#2D9CDB]">
                        Newest
                    </button>
                    <img src="{{ asset('build/assets/drop1.svg') }}" alt="dropdown icon" class="w-3 h-3 mt-1">
                </div>

                <!-- Dropdown Menu -->
                <script src="//unpkg.com/alpinejs" defer></script>
                <div x-show="open" @click.away="open = false"
                    class="absolute mt-2 w-40 bg-white shadow-lg rounded-md border border-gray-200 z-50"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95">
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Newest</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Oldest</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Most Viewed</a>
                </div>
            </div>
        </div>


        <div class="w-[223px] h-[40px] flex flex-row">
            <img src="{{ asset('build/assets/group1.svg') }}" alt="user image">
            <div>
                <div class="flex flex-row ml-2 gap-2">
                    <img src="{{ asset('build/assets/group.svg') }}" alt="icons">
                    <p class="font-semibold">
                        John doe
                    </p>
                </div>
                <p class="text-[12px] ml-4">How are you doing?</p>
            </div>
            <div>
                <p>16:45</p>
                <img src="{{ asset('build/assets/group2.svg') }}" alt="icons" class="ml-4 mt-2">
            </div>
        </div>

        <div class="w-[223px] h-[40px] flex flex-row mt-4">
            <img src="{{ asset('build/assets/p1.svg') }}" alt="user image">
            <div>
                <div class="flex flex-row ml-2 gap-2">
                    <img src="{{ asset('build/assets/group.svg') }}" alt="icons">
                    <p class="font-semibold">
                        Travis Barker
                    </p>
                </div>
                <p class="text-[12px] ml-4">How are you doing?</p>
            </div>
            <div>
                <p>16:45</p>
                <img src="{{ asset('build/assets/group2.svg') }}" alt="icons" class="ml-4 mt-2">
            </div>
        </div>


        <div class="w-[223px] h-[40px] flex flex-row mt-4">
            <img src="{{ asset('build/assets/p2.svg') }}" alt="user image">
            <div>
                <div class="flex flex-row ml-2 gap-2">
                    <img src="{{ asset('build/assets/group.svg') }}" alt="icons">
                    <p class="font-semibold">
                        Kate Rose
                    </p>
                </div>
                <p class="text-[12px] ml-4">How are you doing?</p>
            </div>
            <div>
                <p>16:45</p>
                <img src="{{ asset('build/assets/group2.svg') }}" alt="icons" class="ml-4 mt-2">
            </div>
        </div>


        <div class="w-[223px] h-[40px] flex flex-row mt-4">
            <img src="{{ asset('build/assets/p3.svg') }}" alt="user image">
            <div>
                <div class="flex flex-row ml-2 gap-2">
                    <img src="{{ asset('build/assets/group.svg') }}" alt="icons">
                    <p class="font-semibold">
                        Robert Parker
                    </p>
                </div>
                <p class="text-[12px] ml-4">How are you doing?</p>
            </div>
            <div>
                <p>16:45</p>
                <img src="{{ asset('build/assets/group2.svg') }}" alt="icons" class="ml-4 mt-2">
            </div>
        </div>


        <div class="w-[223px] h-[40px] flex flex-row mt-4">
            <img src="{{ asset('build/assets/p4.svg') }}" alt="user image">
            <div>
                <div class="flex flex-row ml-2 gap-2">
                    <img src="{{ asset('build/assets/group.svg') }}" alt="icons">
                    <p class="font-semibold">
                        Rick Owens
                    </p>
                </div>
                <p class="text-[12px] ml-4">How are you doing?</p>
            </div>
            <div>
                <p>16:45</p>
                <img src="{{ asset('build/assets/group2.svg') }}" alt="icons" class="ml-4 mt-2">
            </div>
        </div>


        <div class="w-[223px] h-[40px] flex flex-row mt-4">
            <img src="{{ asset('build/assets/p5.svg') }}" alt="user image">
            <div>
                <div class="flex flex-row ml-2 gap-2">
                    <img src="{{ asset('build/assets/group.svg') }}" alt="icons">
                    <p class="font-semibold">
                        George Orwell
                    </p>
                </div>
                <p class="text-[12px] ml-4">How are you doing?</p>
            </div>
            <div>
                <p>16:45</p>
                <img src="{{ asset('build/assets/group2.svg') }}" alt="icons" class="ml-4 mt-2">
            </div>
        </div>


        <div class="w-[223px] h-[40px] flex flex-row mt-4">
            <img src="{{ asset('build/assets/p6.svg') }}" alt="user image">
            <div>
                <div class="flex flex-row ml-2 gap-2">
                    <img src="{{ asset('build/assets/group.svg') }}" alt="icons">
                    <p class="font-semibold">
                        Franz Kafka
                    </p>
                </div>
                <p class="text-[12px] ml-4">How are you doing?</p>
            </div>
            <div>
                <p>16:45</p>
                <img src="{{ asset('build/assets/group2.svg') }}" alt="icons" class="ml-4 mt-2">
            </div>
        </div>

        <div class="w-[223px] h-[40px] flex flex-row mt-4">
            <img src="{{ asset('build/assets/p7.svg') }}" alt="user image">
            <div>
                <div class="flex flex-row ml-2 gap-2">
                    <img src="{{ asset('build/assets/group.svg') }}" alt="icons">
                    <p class="font-semibold">
                        Tom Hardy
                    </p>
                </div>
                <p class="text-[12px] ml-4">How are you doing?</p>
            </div>
            <div>
                <p>16:45</p>
                <img src="{{ asset('build/assets/group2.svg') }}" alt="icons" class="ml-4 mt-2">
            </div>
        </div>

        <div class="w-[223px] h-[40px] flex flex-row mt-4">
            <img src="{{ asset('build/assets/p8.svg') }}" alt="user image">
            <div>
                <div class="flex flex-row ml-2 gap-2">
                    <img src="{{ asset('build/assets/group.svg') }}" alt="icons">
                    <p class="font-semibold">
                        Vivienne Westwood
                    </p>
                </div>
                <p class="text-[12px] ml-4">How are you doing?</p>
            </div>
            <div>
                <p>16:45</p>
                <img src="{{ asset('build/assets/group2.svg') }}" alt="icons" class="ml-4 mt-2">
            </div>
        </div>




    </div>
