<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index($user)
    {
        $user_id = $user;
        return view('backend.message.message', compact('user_id'));
    }

    public function messageBox($id)
    {
        $messages = Notification::where('user_id', $id)->get();
        return response()->json($messages);
    }

    public function message2User(Request $request)
    {
        $data = new Notification();
        $data->user_id = $request->user_id;
        $data->user_id2 = 1;
        $data->message = $request->msg_write;
        $data->save();
        return response()->json('success');
    }
}
