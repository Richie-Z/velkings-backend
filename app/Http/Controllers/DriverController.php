<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;

class DriverController extends Controller
{
    public function index(){
    	return Driver::all();
    }
    public function add(Request $req){
    	$bus= Driver::create($req->all());
    	if ($bus) {
    		return 'Data has been added';
    	}
    }
}
