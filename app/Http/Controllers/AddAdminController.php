<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use Hash;

class AddAdminController extends Controller
{
    public function adduser(){
        return view('admin.createuser');
    }

    public function addAdmin(Request $request){

    	$adminRole = Role::find(1);

        $this->validate($request,[
            'aname'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8|confirmed',

        ]);

        $user = User::create([
        	'name'=> request('aname'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);
        
        $user->roles()->attach($adminRole);

        return redirect()->back(); 
    }
}
