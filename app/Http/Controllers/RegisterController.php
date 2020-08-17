<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function register(Request $req){
    	$req->validate([
    		'name'=>['required'],
    		'email'=>['required','email','unique:user'],
    		'password'=>['required','min:8','confirmed']
    	]);
    	User::create([
    		'name'=>$req->name,
    		'email'=>$req->email,
    		'password'=> Hash::make($req->password)
    	]);
    }
}
