<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messanger</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>



<body class="min-h-screen bg-gray-50 overflow-hidden">

    <div class="flex min-h-screen">

        <div class="hidden md:block w-16 bg-gray-100 border-r border-gray-200">
            @include('components.sidelinks')
        </div>

        <div class="hidden md:block w-64 bg-white border-r border-gray-200">
            @include('components.sidebar')
        </div>




    </div>


    <div class="w-full flex flex-col bg-gray-50 h-screen overflow-hidden">

        <div class="flex items-center justify-between p-4 bg-white border-b shadow-sm">
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('build/assets/group1.svg') }}" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <h2 class="text-sm font-semibold text-gray-800">
                            {{ $user->name ?? 'User' }}
                        </h2>
                        <div class="flex items-center gap-1">
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                            <p class="text-xs text-green-500">Online</p>
                        </div>

                    </div>
                </div>

                <div class="flex gap-2">

                    <a href="/">
                        <img src="{{ asset('build/assets/i1.svg') }}" alt="Icon 1" class="w-10 h-10">
                    </a>

                    <a href="/">
                        <img src="{{ asset('build/assets/i2.svg') }}" alt="Icon 2" class="w-10 h-10">
                    </a>

                </div>
            </div>
        </div>

        @if (session('error'))
            <div class="bg-red-500 text-white p-2 mx-4 mt-2 rounded-lg text-sm">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-2 mx-4 mt-2 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div id="chat-container" class="flex-1 overflow-y-auto px-6 py-4 space-y-4">
            @forelse ($messages as $msg)
                @if ($msg->sender_id == auth()->id())
                    <div class="flex justify-end">
                        <div class="text-black bg-gray-100 px-4 py-2 rounded-2xl rounded-br-none max-w-md shadow-sm">
                            @if ($msg->message)
                                <p class="text-sm">{{ $msg->message }}</p>
                            @endif
                            @if ($msg->image)
                                <img src="{{ asset('storage/' . $msg->image) }}"
                                    class="mt-2 rounded-lg max-w-full border border-gray-400">
                            @endif
                            <span class="text-[10px] text-gray-400 block text-right mt-1">
                                {{ $msg->created_at->format('H:i') }}
                            </span>
                        </div>
                    </div>
                @else
                    <div class="flex justify-start gap-3">
                        <img src="{{ asset('build/assets/group1.svg') }}" class="w-8 h-8 rounded-full mt-1">
                        <div
                            class="bg-white px-4 py-2 rounded-2xl rounded-bl-none max-w-md shadow-sm border border-gray-200">
                            @if ($msg->message)
                                <p class="text-sm text-gray-800">{{ $msg->message }}</p>
                            @endif
                            @if ($msg->image)
                                <img src="{{ asset('storage/' . $msg->image) }}" class="mt-2 rounded-lg max-w-full">
                            @endif
                            <span class="text-[10px] text-gray-400 block mt-1">
                                {{ $msg->created_at->format('H:i') }}
                            </span>
                        </div>
                    </div>
                @endif
            @empty
                <div class="h-full flex flex-col items-center justify-center">
                    <p class="text-gray-400">No messages yet. Start the conversation!</p>
                </div>
            @endforelse
        </div>

        <div class="p-4 bg-white border-t">
            <form method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data"
                class="max-w-7xl mx-auto flex items-center gap-3">
                @csrf
                <input type="hidden" name="receiver_id" value="{{ $user->id ?? '' }}">

                <label class="cursor-pointer p-2 rounded-full hover:bg-gray-100 transition flex-shrink-0">
                    <input type="file" name="image" accept="image/*" class="hidden">
                    <img src="{{ asset('build/assets/f11.svg') }}" alt="image icon" class="w-8 h-8">
                </label>

                <input type="text" name="message" placeholder="Type your message here..."
                    class="flex-1 px-5 py-2.5 text-sm bg-gray-100 rounded-full border-none focus:ring-2 focus:ring-gray-300 transition"
                    autocomplete="off">

                <button type="submit"
                    class="bg-green-500 text-white px-6 py-2 rounded-full font-medium text-sm hover:bg-green-600 transition shadow-sm">
                    Send
                </button>
            </form>
        </div>

    </div>

    <script>
        const container = document.getElementById('chat-container');
        container.scrollTop = container.scrollHeight;
    </script>

    <script>
        // Scroll to the bottom of the chat container on page load
        document.addEventListener('DOMContentLoaded', function() {
            const chatDiv = document.getElementById('chat-container');
            if (chatDiv) {
                chatDiv.scrollTop = chatDiv.scrollHeight;
            }

            // Hide success message after 3 seconds
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 3000); // 3 seconds
            }
        });
    </script>

</body>

</html>
