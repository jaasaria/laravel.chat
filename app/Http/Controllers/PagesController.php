<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\tblNotification;
use App\Models\tblNoti;

use App\Notifications\NewsNoti;
use Auth;
use Notification;


class PagesController extends Controller
{
    
 	public function dashboard(){
        $pageTitle = "Dashboard";
        return view('back.pages.dashboard',compact('pageTitle'));
    }

    public function profile(){
        $pageTitle = "Profile";
        return view('back.pages.profile',compact('pageTitle'));
    }

    public function messages(){
        $pageTitle = "Messages";
        return view('back.pages.messages',compact('pageTitle'));
    }


    public function notifications(Request $request){

        $searchBy = $request->get('filter');

        if($searchBy == '0'){   //unread
            $noti = tblNoti::whereStat(0)->orderBy('id', 'desc')->paginate(5);    
        }
        else{                   //all
            $noti = tblNoti::orderBy('id', 'create_at')->paginate(5);    
            // $noti = tblNotification::orderBy('id', 'desc')->paginate(5);    
            $res =  Auth::user()->notifications;

            $noti = $res;    
        }
        $pageTitle = "Notifications";
        return view('back.pages.notifications',compact('pageTitle','noti'));
    }

    public function notificationinfo($id){
        $pageTitle = "Notifications";
        $noti = tblNotification::findOrFail($id);
        if($noti->stat != '1'){
            $noti->stat = 1;
            $noti->save();
        }
        return view('back.pages.notification-info',compact('pageTitle','noti'));
    }    

    public function notificationServer(){
        $pageTitle = "Notifications Server Side";
        return view('back.pages.notifications-server',compact('pageTitle'));
    }    

    public function notificationNewsUnread(){

        // return Auth::user()->unreadNotifications;
        // $res =  tblNotification::whereStat('0')->get();


        $res =  Auth::user()->notifications;
        return $res;

    }  

    public function notificationNewsDropdown(){
        $res =  tblNotification::limit(5)->orderBy('id', 'desc')->get();
        return $res;
    }  

    public function notificationMarkAsRead(){

        // $res =  tblNotification::limit(5)->orderBy('id', 'desc')->get();
        // return $res;

        $user = Auth::user();

        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return "true";


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

        //notification
        $user = auth::user(); //should be all users
        // $user->notify(new notification($noti));

        Notification::send($user, new NewsNoti($noti));

        return redirect()->back()->with('success',' Record was successfully saved.');

    }
    public function settings(){
        $pageTitle = "Settings";
        return view('back.pages.settings',compact('pageTitle'));
    }


}
