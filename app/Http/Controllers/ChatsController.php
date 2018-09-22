<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Message;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }

    public function fetchMessages()
    {
        $message = new Message();
        return $message->getAll();
    }

    public function sendMessage(Request $request, Message $message)
    {
        $request = $request->all();
        $result = $message->newMessage($request);
        broadcast(new ChatEvent($request['message']))->toOthers();

        return $result;
    }
}
