<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Blade::setContentTags('<%', '%>');

Route::get('/', function () {
    return view('index');
});

// Route::post('/student', function() {
//  	//if(Request::ajax()) {
//       $data = Input::all();
//     //}
//     //var_dump($data['_token']);
//     //exit();
// 	return response()->json($data);
// });

Route::resource('user','UserController');