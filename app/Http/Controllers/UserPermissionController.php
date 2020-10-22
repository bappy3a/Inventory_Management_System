<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPermission;
use Gate;
use Auth;

class UserPermissionController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

    	if (Gate::allows('isUserAdmin')) {
    		abort(404, "Sorry, You have no permission to access this page");
    	}

    	$user_lists = Auth::user()->orderBy('name', 'ASC')->get();
    	return view('pages.setting.permission.userlist', compact('user_lists'));
    }

    public function permission($id){

    	if (Gate::allows('isUserAdmin')) {
    		abort(404, "Sorry, You have no permission to access this page");
    	}


        $user = Auth::user()->where('id', $id)->first();
        $user_list = Auth::user()->get();
    	return view('pages.setting.permission.permission', compact('user', 'user_list'));
    }

    public function permission_update(Request $request, $id)
    {
    	if (Gate::allows('isUserAdmin')) {
    		abort(404, "Sorry, You have no permission to access this page");
    	}


    	$user = Auth::user()::find($id);
    	$user->status = $request->status;
    	$user->save();

    	\Session::flash('message', 'User status updated successfully!!');
               return back();
    }

  
}
