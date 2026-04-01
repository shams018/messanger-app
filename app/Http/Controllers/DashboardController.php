<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class DashboardController extends Controller
{
   public function dashboard($receiver_id = null)
{
    $user = auth()->user();
    
    // Fetch all users for sidebar or chat list
    $users = User::where('id', '!=', $user->id)->get();

    // Fetch messages only if receiver is selected
    $messages = [];
    if ($receiver_id) {
        $messages = Message::where(function($q) use ($user, $receiver_id){
                $q->where('sender_id', $user->id)
                  ->where('receiver_id', $receiver_id);
            })->orWhere(function($q) use ($user, $receiver_id){
                $q->where('sender_id', $receiver_id)
                  ->where('receiver_id', $user->id);
            })->get();
    }

    return view('dashboard', compact('users', 'messages', 'receiver_id'));
}
}