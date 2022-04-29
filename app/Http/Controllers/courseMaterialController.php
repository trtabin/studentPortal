<?php

namespace App\Http\Controllers;

use App\Models\courseMaterial;
use App\Models\course;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class courseMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseMaterial = courseMaterial::with(["course","user"])->get();
        $courses = course::with(["courseMaterial"])->get();
        // dd($courses[0]);
        return view('courseMaterial.index',['courses'=>$courses]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = course::all();
        return view('courseMaterial.create',['courses'=>$courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:5|max:255',
            'link' => 'url|min:10|max:255',
            'course_id' => 'required|min:1',
        ]);

        $courseMaterial = new courseMaterial();
    	$courseMaterial->name = Request('name');
    	$courseMaterial->link = Request('link');
    	$courseMaterial->course_id = Request('course_id');
        $courseMaterial->user_id = Auth::user()->id;        
        $courseMaterial->save();

        $course = course::find(Request('course_id'));
        return redirect('/courseMaterial/'.$course->year.'/'.$course->term);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\courseMaterial  $courseMaterial
     * @return \Illuminate\Http\Response
     */
    public function show($year,$term)
    {
        $courses = course::where([['year', $year],['term', $term]])->orderBy('id')->take(10)->get();
        return view('courseMaterial.show',['courses'=>$courses]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\courseMaterial  $courseMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courseMaterial = courseMaterial::find($id);
        if($courseMaterial->user_id === Auth::user()->id){
            // The owner of the courseMaterial can edit the courseMaterial
            $courses = course::all();
            return view('courseMaterial.edit', ['courseMaterial'=>$courseMaterial, 'courses'=>$courses]);
        }

        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\courseMaterial  $courseMaterial
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        request()->validate([
            'name' => 'required|min:5|max:255',
            'link' => 'url|min:10|max:255',
            'course_id' => 'required|min:1',
        ]);

        $courseMaterial = courseMaterial::find($id);
    	$courseMaterial->name = Request('name');
    	$courseMaterial->link = Request('link');
    	$courseMaterial->course_id = Request('course_id');
        $courseMaterial->user_id = Auth::user()->id; 
        // dd($courseMaterial->toArray());
        $courseMaterial->save();

        $course = course::find(Request('course_id'));
        return redirect('/courseMaterial/'.$course->year.'/'.$course->term);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\courseMaterial  $courseMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(courseMaterial $courseMaterial)
    {
        //
    }
}
