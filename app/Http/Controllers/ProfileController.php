<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

//use this for the picture and intervention
use Image;
use File;



class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = auth::user();
        $pageTitle = "Profile";
        return view('back.pages.profile',compact('pageTitle','data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        // dd($request);
        $this->validate($request, [
            'name' => 'required|max:255',
            'middlename' => 'required|max:255',
            'lastname' => 'required|max:255',
            'avatar' => 'mimes:jpeg,jpg,png|max:3000'
        ]);

     

        Auth::user()->update(
        array(
            'name' =>  ucfirst($request->name),
            'middlename' => ucfirst($request->middlename),
            'lastname' => ucfirst($request->lastname),
            'job' => ucfirst($request->job),
            'about' => ucfirst($request->about)
        ));


         if ($request->hasfile('avatar')) {

            $user = Auth::user();

            $avatar = $request->file('avatar');
            $filename = $user->id . '-' .  time() . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('upload/avatars/' . $filename);

            //deleting image if not default
            if ($user->avatar !== 'default.png') {
                $tempfile = 'upload/avatars/' . $user->avatar;
                if (File::exists($tempfile)) {
                    unlink($tempfile);
                }
            }
            Image::make($avatar)->resize(160,160)->save($path);           

            Auth::user()->update(
            array(
                'avatar' => $filename
            ));

            
            // return back()
            //     ->with('error', "Upload File is not valid");

        }

    




        return back()->with('success',' Record was successfully updated.');    

        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
