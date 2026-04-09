<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messanger</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>



<body class="min-h-screen bg-gray-50 overflow-hidden">

    <div class="flex min-h-screen">

        <div class="w-16 bg-gray-100 border-r border-gray-200">
            @include('components.sidelinks')
        </div>

        <div class="w-64 bg-white border-r border-gray-200">
            @include('components.sidebar')
        </div>




    </div>


    <div class="w-1/3 border-l flex flex-col bg-gray-50 h-screen">

        <!-- Header -->
        <div class="flex items-center justify-between p-4 bg-white border-b">
            <div class="flex items-center gap-3">
                <img src="{{ asset('build/assets/group1.svg') }}" class="w-10 h-10 rounded-full">
                <div>
                    <h2 class="text-sm font-semibold text-gray-800">
                        {{ $user->name ?? 'User' }}
                    </h2>
                    <p class="text-xs text-green-500">Online</p>
                </div>
            </div>
        </div>

        @if (session('error'))
            <div class="bg-red-500 text-white p-2 mx-4 mt-2 rounded">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-2 mx-4 mt-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Messages -->
        <div id="chat-container" class="flex-1 overflow-y-auto px-4 py-3 space-y-4">

            @forelse ($messages as $msg)

                @if ($msg->sender_id == auth()->id())
                    <!-- My Message -->
                    <div class="flex justify-end">
                        <div class=" text-black px-4 py-2 rounded-2xl rounded-br-none max-w-xs shadow relative">

                            @if ($msg->message)
                                <p class="text-sm">{{ $msg->message }}</p>
                            @endif

                            @if ($msg->image)
                                <img src="{{ asset('storage/' . $msg->image) }}" class="mt-2 rounded-lg max-w-full">
                            @endif

                            <!-- Time -->
                            <span class="text-[10px] text-white/70 block text-right mt-1">
                                {{ $msg->created_at->format('H:i') }}
                            </span>
                        </div>
                    </div>
                @else
                    <!-- Other User -->
                    <div class="flex justify-start gap-2">
                        <img src="{{ asset('build/assets/group1.svg') }}" class="w-8 h-8 rounded-full mt-1">

                        <div class="bg-white px-4 py-2 rounded-2xl rounded-bl-none max-w-xs shadow border">

                            @if ($msg->message)
                                <p class="text-sm text-gray-800">{{ $msg->message }}</p>
                            @endif

                            @if ($msg->image)
                                <img src="{{ asset('storage/' . $msg->image) }}" class="mt-2 rounded-lg max-w-full">
                            @endif

                            <!-- Time -->
                            <span class="text-[10px] text-gray-400 block mt-1">
                                {{ $msg->created_at->format('H:i') }}
                            </span>
                        </div>
                    </div>
                @endif

            @empty
                <p class="text-center text-gray-400 mt-10">No messages yet</p>
            @endforelse

        </div>

        <!-- Input -->
        <form method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data"
            class="flex items-center gap-2 p-3 bg-white border-t">
            @csrf

            <input type="hidden" name="receiver_id" value="{{ $user->id ?? '' }}">

            <!-- Upload -->
            <label class="cursor-pointer p-2 rounded-full hover:bg-gray-200 transition">
                <input type="file" name="image" accept="image/*" class="hidden">
                <img src="{{ asset('build/assets/f11.svg') }}" alt="imge icon">

            </label>

            <!-- Input -->
            <input type="text" name="message" placeholder="Type your message here..."
                class="flex-1 px-4 py-2 text-sm bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-orange-400">

            <!-- Send -->
            <button type="submit" class="text-green-500 font-medium text-sm hover:underline">
                Send message
            </button>
        </form>

    </div>

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
