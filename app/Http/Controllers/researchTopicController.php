<?php

namespace App\Http\Controllers;

use App\Models\researchTopic;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class researchTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researchTopic = researchTopic::with("user")->latest()->get();
        return view('researchTopic.index',['researchTopics'=>$researchTopic]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('researchTopic.create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'title' => 'required|min:10|max:255',
            'abstract' => 'required|min:10|max:1500',
            'supervisor' => 'required|max:255',
        ]);

        $researchTopic = new researchTopic();
    	$researchTopic->title = Request('title');
    	$researchTopic->abstract = Request('abstract');
    	$researchTopic->supervisor = Request('supervisor');
        
        
        $researchTopic->save();

        $researchTopic->user()->attach(Request('teammates'));
        return redirect("/researchTopic/");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\researchTopic  $researchTopic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $researchTopic = researchTopic::with("user")->find($id);
        return view('researchTopic.show',['researchTopic'=>$researchTopic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\researchTopic  $researchTopic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $researchTopic = researchTopic::find($id);
        $users = User::all();
        foreach ($researchTopic->user as $user) {
            if(Auth::user()->id === $user->id){
                return view('researchTopic.edit', ['researchTopic'=>$researchTopic, 'users'=>$users]);
            }
        }

        return redirect()->route('home');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\researchTopic  $researchTopic
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        request()->validate([
            'title' => 'required|min:10|max:255',
            'abstract' => 'required|min:10|max:1500',
            'supervisor' => 'required|max:255',
        ]);

        $researchTopic = researchTopic::find($id);
    	$researchTopic->title = Request('title');
    	$researchTopic->abstract = Request('abstract');
        $researchTopic->supervisor = Request('supervisor');
        
        // dd($researchTopic);
        $researchTopic->save();
    	return redirect("/researchTopic/".$researchTopic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\researchTopic  $researchTopic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
