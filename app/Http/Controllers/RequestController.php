<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserRequest;
use Auth;

class RequestController extends Controller
{
    //
    public function add(Request $request){
    	// return $request;
    	$validatedData = $request->validate([
        'request_item' => 'required',
    ]);

    	// return $validatedData;

    	$req = new UserRequest();
    	$req->request_item = $request->request_item;
    	$req->user_id = Auth::user()->id;
    	$req->save();

    	return back();
    }

    public function getAll(){
    	return UserRequest::all();
    }
}
