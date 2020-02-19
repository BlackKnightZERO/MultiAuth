<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Controller;
use App\User;
use App\UserRequest;

class RequestController extends Controller
{
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
    public function getMyRequests(){
    	// $myReqs =  Auth()->User()->userRequest;
    	try{
    		$user = Auth()->userOrFail();
    	}
    	catch(\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e){
    		return response()->json(['error'=> $e->getMessage() ]);
    	}
    	return $user->userRequest;
    }
    public function addRequest(Request $request){
    	try{
    		$user = Auth()->userOrFail();
    	}
    	catch(\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e){
    		return response()->json(['error'=> $e->getMessage() ]);
    	}
    	$new_req = new UserRequest();
    	$new_req->user_id = Auth()->User()->id;
    	$new_req->request_item = $request->request_item;
    	$check = $new_req->save();

    	if($check){
    		return response()->json(['success'=> 'You Added A New Request' ]);
    	} else {
    		return response()->json(['error'=> 'Failed' ]);
    	}
    }
}
