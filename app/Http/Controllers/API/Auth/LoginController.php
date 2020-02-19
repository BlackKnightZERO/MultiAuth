<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
    	$creds = $request->only(['email', 'password']);
    	// $token = Auth()->attempt($creds);

    	if(!$token = Auth()->attempt($creds)){
    		return response()->json(['error'=>'Incorrect Email or Password']);
    	}

    	return response()->json(['token'=>$token]);
    }
}
