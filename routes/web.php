<?php

use Illuminate\Support\Facades\Route;

use App\Models\course;
use App\Models\courseMaterial;
use Illuminate\Http\request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('secondOption.welcome');
});

Route::get('/courseMaterial/{year}/{term}', function ($year,$term) {
    $courses = course::where([['year', $year],['term', $term]])->orderBy('id')->take(10)->get();
    return view('secondOption.courseMaterial',['courses'=>$courses]);
});

Route::get('/researchTopic', function () {
    return view('secondOption.research');
});

Route::get('/questionBank', function () {
    return view('secondOption.question');
});

Route::get('/course', function () {
    return view('secondOption.course');
});

Route::get('/shareDocument', function () {
    $courses = course::all();
    return view('secondOption.shareDocument',['courses'=>$courses]);
});

Route::post('/shareDocument', function () {

    $data = request('courseCode');
    $data = json_decode($data);
    $couseCode = $data->courseCode;
    // dump($data);

    $material = new courseMaterial();   
    $material->name = request('fileName');
    $material->link = request('link');
    $material->courseCode = $couseCode;
    $material->save();

    // return redirect('/');
    return redirect('/courseMaterial/'.$data->year.'/'.$data->term);

});
