<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;

class BusController extends Controller
{
    public function index(){
    	return Bus::all();
    }
    public function add(Request $req){
    	$bus= Bus::create([
    		'plate_number'=>$req->plate_number,
    		'brand'=>$req->brand,
    		'seat'=>$req->seat,
    		'price_per_day'=>$req->price_per_day]);
    	if ($bus) {
    		return 'Data has been added';
    	}
    }
}
