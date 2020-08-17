<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $req){
    	$req->validate([
    		'email'=>['required'],
    		'password'=>['required']
    	]);
    	if (Auth::attempt($req->only('email','password'))) {
    		return response()->json(Auth::user(), 200);
    	}
    	throw ValidationException::withMessages([
    		'email' => ['incorect email']
    	]);
    }
    public function logout(){
    	Auth::logout();
    }
}
