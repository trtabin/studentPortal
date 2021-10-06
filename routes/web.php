<?php

use Illuminate\Support\Facades\Route;

use App\Models\course;

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
    return view('welcome');
});

Route::get('/courseMaterial/{year}/{term}', function ($year,$term) {
    $courses = course::where([['year', $year],['term', $term]])->orderBy('id')->take(10)->get();
    return view('courseMaterial',['courses'=>$courses]);
});
