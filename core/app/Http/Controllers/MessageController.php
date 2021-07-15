<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index($user)
    {
        $name = User::findOrFail($user);
        $user_id = $user;
        return view('backend.message.message', compact('user_id', 'name'));
    }

    public function messageBox($id)
    {
        // $name = User::findOrFail($id);
        $messages = Notification::where('user_id', $id)->with('user')->get();
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

    public function unSeenMessage()
    {
        $unseenmessage = Notification::where('user_id2', null)->where('status', 0)->orderBy('id', 'desc')->get();
        return response()->json($unseenmessage);
    }

    public function StatusUpdate($id)
    {
        $data = Notification::findOrFail($id);
        $data->status = 1;
        $data->save();

        return response()->json('success');
    }
}
