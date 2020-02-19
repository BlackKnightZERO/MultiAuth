<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/requests','API\RequestController@getAll');
Route::post('/login','API\Auth\LoginController@login');
Route::get('/my-requests','API\RequestController@getMyRequests');
Route::post('/add-requests','API\RequestController@addRequest');
// Route::get('/',function(){
// 	return 'ok';
// });
