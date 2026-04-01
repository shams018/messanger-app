<h2 class="text-xl font-semibold text-center mb-3">Chat</h2>

@if (session('error'))
    <div class="bg-red-500 text-white p-2 mb-3 rounded">
        {{ session('error') }}
    </div>
@endif

<div id="chat-container" class="h-72 overflow-y-auto p-3 bg-gray-50 space-y-2 border border-gray-300 rounded">
    @if (isset($messages) && count($messages) > 0)
        @foreach ($messages as $msg)
            <div class="flex {{ $msg->sender_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
                <div class="max-w-[70%] bg-white px-3 py-2 rounded shadow-sm text-gray-800">
                    <span class="font-bold text-gray-700">
                        {{ $msg->sender_id == auth()->id() ? 'Me' : $msg->sender->name }}:
                    </span>

                    @if ($msg->message)
                        <p>{{ $msg->message }}</p>
                    @endif

                    @if ($msg->image)
                        <img src="{{ asset('storage/' . $msg->image) }}" class="mt-2 rounded max-w-full h-auto"
                            alt="image">
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <p class="text-center text-gray-400">No messages yet</p>
    @endif
</div>

<form method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data" class="flex gap-2 mt-2">
    @csrf
    <input type="hidden" name="receiver_id" value="{{ $id ?? '' }}">
    <input type="text" name="message" placeholder="Type message..." class="flex-1 border rounded px-3 py-2">
    <input type="file" name="image" accept="image/*" class="border rounded px-2 py-1">
    <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Send</button>
</form>

<script>
    const chatDiv = document.getElementById('chat-container');
    if (chatDiv) chatDiv.scrollTop = chatDiv.scrollHeight;
</script>
