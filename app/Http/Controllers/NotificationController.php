<?php

namespace App\Http\Controllers;
use Ajax;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    function index()
    {
        $type = $this->userType();
        $data['notifications'] = auth()->guard($type)->user()->unreadNotifications;
        Ajax::redrawView('notif'); 
        return Ajax::view('notifications.backoffice.index',$data);
    } 


    function all()
    {
        $type = $this->userType();
        auth()->guard($type)->user()->notifications;
    } 

    public function read($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->markAsRead();
        return redirect($notification->data['link']);
    }


    public function userType()
    {
        $profiles= [ 'partner', 'staff','business'];
        for($i=0; $i<3; $i++)
        {
            if(auth()->guard($profiles[$i])->check())
            {
                break;
            }
        }
        return $profiles[$i];
    }
}

