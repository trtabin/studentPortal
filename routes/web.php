<?php

use Illuminate\Support\Facades\Route;

use App\Models\course;
use App\Models\User;
use App\Models\userInfo;
use App\Models\projects;
use App\Models\researchTopic;
use App\Models\courseMaterial;
use Illuminate\Http\request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
})->name('home');


Route::get('/makeDirectory', function(){
    for ($year=01; $year < 5 ; $year++) { 
       for ($term=1; $term < 5; $term++) { 
            $courses = course::where([['year', $year],['term', $term]])->orderBy('id')->take(10)->get();
            foreach($courses as $course){
                Storage::makeDirectory('Year '.$year.' Term '.$term.'/'.$course->courseCode);
            }
       }
    }
})->middleware('verified');;


Route::get('/download_file/{yearTerm}/{courseCode}/{fileName}', function ($yearTerm,$courseCode,$fileName) {
    if (!function_exists('mime_content_type')) {

        function mime_content_type($filename)
        {
    
            $mime_types = array(
    
                'txt' => 'text/plain',
                'htm' => 'text/html',
                'html' => 'text/html',
                'php' => 'text/html',
                'css' => 'text/css',
                'js' => 'application/javascript',
                'json' => 'application/json',
                'xml' => 'application/xml',
                'swf' => 'application/x-shockwave-flash',
                'flv' => 'video/x-flv',
    
                // images
                'png' => 'image/png',
                'jpe' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'jpg' => 'image/jpeg',
                'gif' => 'image/gif',
                'bmp' => 'image/bmp',
                'ico' => 'image/vnd.microsoft.icon',
                'tiff' => 'image/tiff',
                'tif' => 'image/tiff',
                'svg' => 'image/svg+xml',
                'svgz' => 'image/svg+xml',
    
                // archives
                'zip' => 'application/zip',
                'rar' => 'application/x-rar-compressed',
                'exe' => 'application/x-msdownload',
                'msi' => 'application/x-msdownload',
                'cab' => 'application/vnd.ms-cab-compressed',
    
                // audio/video
                'mp3' => 'audio/mpeg',
                'qt' => 'video/quicktime',
                'mov' => 'video/quicktime',
    
                // adobe
                'pdf' => 'application/pdf',
                'psd' => 'image/vnd.adobe.photoshop',
                'ai' => 'application/postscript',
                'eps' => 'application/postscript',
                'ps' => 'application/postscript',
    
                // ms office
                'doc' => 'application/msword',
                'rtf' => 'application/rtf',
                'xls' => 'application/vnd.ms-excel',
                'ppt' => 'application/vnd.ms-powerpoint',
    
                // open office
                'odt' => 'application/vnd.oasis.opendocument.text',
                'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
                );
                
            $value = explode(".", $filename);
            $ext = strtolower(array_pop($value));
            if (array_key_exists($ext, $mime_types)) {
                return $mime_types[$ext];
            } elseif (function_exists('finfo_open')) {
                $finfo = finfo_open(FILEINFO_MIME);
                $mimetype = finfo_file($finfo, $filename);
                finfo_close($finfo);
                return $mimetype;
            } else {
                return 'application/octet-stream';
            }
        }
    }
    if(Storage::disk('public')->exists($yearTerm.'/'.$courseCode.'/'.$fileName)){
        $path = Storage::disk('public')->path($yearTerm.'/'.$courseCode.'/'.$fileName);
        $content = file_get_contents($path);
        return response($content)->withHeaders([
            'Content-Type' => mime_content_type($path)
        ]);
    }
    return redirect('/404');
})->middleware('verified');;

Auth::routes(['verify' => true]);

Route::get('/home', 'App\Http\Controllers\HomeController@index')->middleware(["verified"]);

Route::get('user', 'App\Http\Controllers\userController@index')->middleware('verified');
Route::get('user/{id}', 'App\Http\Controllers\userController@show')->middleware('verified');

Route::get('userInfo/edit','App\Http\Controllers\UserInfoController@edit')->middleware('verified');
Route::put('userInfo/{id}','App\Http\Controllers\UserInfoController@update')->middleware('verified');

Route::post('projects','App\Http\Controllers\projectController@store')->middleware('verified');
Route::get('projects','App\Http\Controllers\projectController@index')->middleware('verified');
Route::get('projects/create','App\Http\Controllers\projectController@create')->middleware('verified');
Route::get('projects/{id}','App\Http\Controllers\projectController@show')->middleware('verified');
Route::get('projects/{id}/edit','App\Http\Controllers\projectController@edit')->middleware('verified');
Route::put('projects/{id}','App\Http\Controllers\projectController@update')->middleware('verified');

Route::post('courseMaterial','App\Http\Controllers\courseMaterialController@store')->middleware('verified');
Route::get('courseMaterial','App\Http\Controllers\courseMaterialController@index')->middleware('verified');
Route::get('courseMaterial/create','App\Http\Controllers\courseMaterialController@create')->middleware('verified');
Route::get('courseMaterial/{id}/edit','App\Http\Controllers\courseMaterialController@edit')->middleware('verified');
Route::get('courseMaterial/{year}/{term}','App\Http\Controllers\courseMaterialController@show')->middleware('verified');
Route::put('courseMaterial/{id}','App\Http\Controllers\courseMaterialController@update')->middleware('verified');

Route::post('researchTopic','App\Http\Controllers\researchTopicController@store')->middleware('verified');
Route::get('researchTopic','App\Http\Controllers\researchTopicController@index')->middleware('verified');
Route::get('researchTopic/create','App\Http\Controllers\researchTopicController@create')->middleware('verified');
Route::get('researchTopic/{id}','App\Http\Controllers\researchTopicController@show')->middleware('verified');
Route::get('researchTopic/{id}/edit','App\Http\Controllers\researchTopicController@edit')->middleware('verified');
Route::put('researchTopic/{id}','App\Http\Controllers\researchTopicController@update')->middleware('verified');


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
