<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct(){

$this->middleware('admin');

}

public function viewusers(){

    $users = User::paginate(5);
    return view('users', compact('users'));
}

public function adduser(){
    $roles = Role::where('id', '!=', '1')->get();
    return view('adduser', compact('roles'));
}

public function store(Request $request){
    $this->validate(request(), [

      'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required',
            'password' => 'required|string|min:6|confirmed',


    ]);

    $user = new User;

    $user->name = request('name');
    $user->email = request('email');
    $user->password = Hash::make(request('password'));
    $user->role_id = request('role');


    $user->save();
    return redirect ('/users');

}


public function destroy(Request $request){

$user = User::find($request->user_id);
$user->delete();

return redirect('/users');

}


}
