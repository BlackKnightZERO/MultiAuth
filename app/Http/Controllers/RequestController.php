<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserRequest;
use Auth;
use App\User;
use yajra\Datatables\Datatables;

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

    public function getuser(){
        $data = User::all();
        return DataTables::of(User::query())
        ->setRowClass('{{ $id % 2 == 0 ? "alert-success" : "alert-warning" }}')

        ->setRowId('{{$id}}')
        // ->setRowAttr([
        // 'align' => 'center'
        // ])
         ->addColumn('intro', 'Hi {{$name}}!')
         ->addColumn('created_at', function(User $user) {
                    return $user->created_at->diffForHumans();
                })
         ->addColumn('action', 'layouts.datatableColumn')
         ->rawColumns(['action'])
        // ->make(true);
        ->toJson();
    }
}
