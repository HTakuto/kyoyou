<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    public function markAsRead(Notification $notification)
    {
        $notification->markAsRead();

        return redirect()->back();
    }
}
