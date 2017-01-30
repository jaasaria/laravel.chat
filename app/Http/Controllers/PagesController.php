<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrSettings;
use App\Models\tblNotification;
use DB;
// use Illuminate\Support\Facades\DB;

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

        if($searchBy == '0'){
            $noti = tblNotification::whereStat(0)->orderBy('id', 'desc')->paginate(5);    
        }
        else{
            $noti = tblNotification::orderBy('id', 'desc')->paginate(5);    
        }

        $pageTitle = "Notifications";
        return view('back.pages.notifications',compact('pageTitle','noti'));
    }
    public function notificationinfo($id){

        //add process to update status to read.
        $pageTitle = "Notifications";
        $noti = tblNotification::findOrFail($id);
        return view('back.pages.notificationinfo',compact('pageTitle','noti'));
    }

    public function settings(){
        $pageTitle = "Settings";
        return view('back.pages.settings',compact('pageTitle'));
    }


}
