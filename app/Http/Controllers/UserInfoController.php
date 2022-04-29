<?php

namespace App\Http\Controllers;

use App\Models\userInfo;
use App\Models\user;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\userInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function show(userInfo $userInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->with('userInfo')->firstorFail();

        if(!$user->userInfo){
            // This means userInfo is not created.
            // First Create a userInfo
            $userInfo = new userInfo();
            $userInfo->student_id = "";
            $userInfo->email = $user->email;
            $userInfo->phone = "";
            $userInfo->skill = "";
            $userInfo->image = "";
            $userInfo->session = "";
            $userInfo->address = "";
            $userInfo->linkedin = "";
            $userInfo->fb = "";
            $user->userInfo()->save($userInfo);

            //Then read the data for edit
            $user = User::where('id', $user_id)->with('userInfo')->firstorFail();
        }

        // dd($user->userInfo);
        return view('userInfo.edit', ['userInfo'=>$user->userInfo]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        request()->validate([
            'image' => 'image|mimes:jpg,png|max:200',
        ]);

        


        $userInfo = userInfo::find($id);
    	$userInfo->student_id = Request('student_id');
    	$userInfo->session = Request('session');
    	$userInfo->phone = Request('phone');
    	$userInfo->address = Request('address');
    	$userInfo->linkedin = Request('linkedin');
    	$userInfo->fb = Request('fb');
    	$userInfo->skill = Request('skill');
    	if(Request('image')){
            $imageName = Auth::user()->id .'.'.Request('image')->getClientOriginalExtension();  
            Request('image')->move(public_path('images'), $imageName);
            $userInfo->image = $imageName;
            
        }

        
        // dd($userInfo);
        $userInfo->save();
    	return redirect("/user/".$userInfo->user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(userInfo $userInfo)
    {
        //
    }
}
