<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    // Chat with a user
    public function chatWith($userId)
    {
        $messages = Message::with(['sender', 'receiver'])
            ->where(function ($query) use ($userId) {
                $query->where('sender_id', auth()->id())
                      ->where('receiver_id', $userId);
            })
            ->orWhere(function ($query) use ($userId) {
                $query->where('sender_id', $userId)
                      ->where('receiver_id', auth()->id());
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('chat', [
            'messages' => $messages,
            'id' => $userId,
        ]);
    }

    // Send Message
 public function send(Request $request)
{
    $request->validate([
        'receiver_id' => 'required|exists:users,id',
        'message' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // ❗ Prevent empty message
    if (!$request->message && !$request->hasFile('image')) {
        return redirect()->back()->with('error', 'Message or image required');
    }

    if (!auth()->check()) {
        return redirect()->back()->with('error', 'You must be logged in to send messages');
    }

    $data = [
        'sender_id' => auth()->id(),
        'receiver_id' => $request->receiver_id,
        'message' => trim($request->message),
    ];

    // Upload image
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('chat_images', 'public');
    }

    try {
        Message::create($data);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to send message: ' . $e->getMessage());
    }

    // Redirect back to the same page to show the updated messages
    return redirect('/')->with('success', 'Message sent successfully');
}
}
