<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SendNotification;
use App\Events\Test;
use App\User;
use Illuminate\Notifications\Notification;
use App\Notifications\AlertNotification;
use Pusher\Pusher;

class NotificationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        return view('form-notification');
    }

    public function sendNotification(Request $request){

        $title = $request->title;
        // dd($title);
        $content = $request->content;

        $message = '[Title]'.$title.' [Content]'.$content;


        event(new SendNotification($message));
        return redirect()->back();
    }
}
