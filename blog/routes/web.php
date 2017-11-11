<?php

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
use Illuminate\Support\Facades\Input;
use App\Api;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/api', 'ApiController@saveApiData');
Route::get('/display', 'ApiController@display');

Route::any('/search',function(){
	
    $q = Input::get ( 'q' );
    $display = Api::where('name','LIKE','%'.$q.'%')->get();
    if(count($display) > 0)
        return view('newdisplay')->withDetails($display)->withQuery ( $q );
    else return view ('newdisplay')->withDetails();
});