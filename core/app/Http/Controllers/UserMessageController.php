<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMessageController extends Controller
{
    public function messageindex()
    {
        $user_id = Auth::guard('web')->user()->id;
        $name = User::findOrFail($user_id);
        return view('user.message.message', compact('name', 'user_id'));
    }

    public function messageGet()
    {
        $user_id = Auth::guard('web')->user()->id;
        $messages = Notification::where('user_id', $user_id)->with('user')->get();
        return response()->json($messages);
    }

    public function messageSent(Request $request)
    {
        $data = new Notification();
        $data->user_id = $request->user_id;
        $data->message = $request->msg_write;
        $data->save();
        return response()->json('success');
    }
}
