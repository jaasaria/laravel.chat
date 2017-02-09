<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\tblNotification;
use App\Models\tblNoti;
use App\User;
use App\Notifications\NewsNoti;
use Auth;
use Notification;


class PagesController extends Controller
{
    
 	public function dashboard(){
        $pageTitle = "Dashboard";
        return view('back.pages.dashboard',compact('pageTitle'));
    }

    public function messages(){
        $pageTitle = "Messages";
        return view('back.pages.messages',compact('pageTitle'));
    }

    public function notifications(Request $request){

        $searchBy = $request->get('filter');

        if($searchBy == '0'){ //unread
            $noti =  Auth::user()->noti()
                    ->whereNull('read_at')
                    ->orderBy('created_at', 'asc')
                    ->paginate(5);          
        }
        else{ //all
            $noti =  Auth::user()->noti()->orderBy('created_at', 'desc')->paginate(5);
        }

        $pageTitle = "Notifications";
        return view('back.pages.notifications',compact('pageTitle','noti'));
    }

    public function notificationinfo($data){

        $pageTitle = "Notifications";
        $noti = tblNoti::findOrFail($data);

        // update for the user notification
        if($noti->unread()){
            $noti->markAsRead();
        }
        return view('back.pages.notification-info',compact('pageTitle','noti'));
    }    

    public function notificationServer(){
        $pageTitle = "Notifications Server Side";
        return view('back.pages.notifications-server',compact('pageTitle'));
    }    

    public function notificationNewsUnread(){

        $res =  Auth::user()->unreadNotifications;
        return $res;

    }  

    public function notificationNewsDropdown(){
        $res = Auth::user()->noti()->limit(5)->orderBy('created_at', 'desc')->get();
        return $res;
    }  

    public function notificationPost(Request $request){

        $this->validate($request, [
            'title' => 'required|max:255|min:6',
            'description' => 'required|min:6',
        ]);

        $chk = $request->email;
        $chkval = ($chk == 'on'? 1:0); 

        $noti = tblNotification::create(array(
            'title' =>  ucfirst($request->title),
            'description' => ucfirst($request->description),
            'slug' => str_slug($request->title),
            'with_email' => $chkval,
            'avatar' => 'default.jpg',
            'stat' => '0'
        ));

        //should be in event to reduce the interval
        $users = User::get();
        foreach ($users as $user) {
            Notification::send($user, new NewsNoti($noti));
        }

        return back()->with('success',' Record was successfully saved.');

    }

    public function settings(){
        $pageTitle = "Settings";
        return view('back.pages.settings',compact('pageTitle'));
    }


}
