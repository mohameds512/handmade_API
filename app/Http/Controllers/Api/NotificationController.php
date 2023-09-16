<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Http\Resources\flutter\NotificationResources;

class NotificationController extends Controller
{
    public function getNotification(Request $request) {
        $notifications = Notifications::where('user_id',$request->user_id)
                        ->join('users','users.id','notifications.user_id')
                        ->select('notifications.*','users.name as user_name')
                        ->orderBy('id','DESC')
                        ->get();

        $data = NotificationResources::collection($notifications);

        return response(['notifications'=> $data]);
    }
}