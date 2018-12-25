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
        $data['notifications'] = auth()->guard($type)->user()->notifications()->orderBy('created_at', 'desc')->get();
        // $data['unread'] = auth()->guard($type)->user()->unreadNotifications->count() ? true : false ;
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
    public function markAsRead(Ajax $ajax, $id)
    {
        $notification = Notification::findOrFail($id);
        $notification->markAsRead();
        
        // return $notification;
        return Ajax::jsonResponse();
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

