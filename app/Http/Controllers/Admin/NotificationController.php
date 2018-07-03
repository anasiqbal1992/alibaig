<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

     public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
    }
}
