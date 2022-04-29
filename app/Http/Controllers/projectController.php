<?php

namespace App\Http\Controllers;

use App\Models\projects;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = projects::with("user")->latest()->get();
        return view('project.index',['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('project.create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {
        $request->validate([
            'title' => 'required|min:10|max:255',
            'description' => 'required|min:10|max:255',
            'apparatus' => 'required|min:10|max:255',
            'video' => 'url|nullable',
        ]);

        $project = new Projects();
    	$project->title = Request('title');
    	$project->description = Request('description');
    	$project->apparatus = Request('apparatus');
        $project->video = $this->YoutubeID(Request('video'));
        
        
        $project->save();
        $project->user()->attach(Request('teammates'));
        return redirect("/projects/");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = projects::with("user")->find($id);
        return view('project.show',['project'=>$project]);

         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $project = Projects::find($id);
        $users = User::all();
        foreach ($project->user as $user) {
            if(Auth::user()->id === $user->id){
                return view('project.edit', ['project'=>$project, 'users'=>$users]);
            }
        }

        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        request()->validate([
            'title' => 'required|min:10|max:255',
            'description' => 'required|min:10|max:255',
            'apparatus' => 'required|min:10|max:255',
            'video' => 'url|nullable',
        ]);

        $project = Projects::find($id);
    	$project->title = Request('title');
    	$project->description = Request('description');
    	$project->apparatus = Request('apparatus');
        $project->video = $this->YoutubeID(Request('video'));
        
        // dd($project);
        $project->save();
    	return redirect("/projects/".$project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(projects $projects)
    {
        //
    }

    private function YoutubeID($url)
    {
        if(strlen($url) > 11)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
            {
                
                return "http://www.youtube.com/embed/".$match[1];
            }
            else
                return false;
        }
        
        return $url;


    }
    
}
