<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::middleware('auth')->group(function () {

    Route::get('/chat/{user}', [MessageController::class, 'chatWith'])->name('chat.with');

    Route::post('/send-message', [MessageController::class, 'send'])->name('send.message');

});

use App\Models\Message;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // Make sure user is logged in, otherwise adjust
    $userId = Auth::id(); // current logged in user

    // Example: get all messages for this user
    $messages = Message::with('sender') // eager load sender to avoid N+1
                        ->where('sender_id', $userId)
                        ->orWhere('receiver_id', $userId)
                        ->orderBy('created_at', 'asc')
                        ->get();

    // Pick a receiver for testing, or null
    $receiverId = 2; // or some logic to choose
    $receiver = \App\Models\User::find($receiverId);

    return view('welcome', [
        'messages' => $messages,
        'id' => $receiverId,
        'user' => $receiver,
    ]);
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
