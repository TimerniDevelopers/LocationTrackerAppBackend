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
}
