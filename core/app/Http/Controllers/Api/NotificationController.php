<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function submitNotification(Request $request)
    {
        $user_id = Auth::guard()->user()->id;
        
        // Notification::saveNotificationDataAjax($request, $user_id);

        $data = new Notification();

        $data->user_id = $user_id;
        $data->message = $request->message;
        $data->save();

        return response()->json('success');
        
    }

    public function GetNotification()
    {
        try{
            $user_id = Auth::guard()->user()->id;
            $messages = Notification::where('user_id', $user_id)->with('user')->get();

            return response()->json($messages);
        }catch (\Exception $e){
            return response()->json('something error');
        }
        
    }
}
