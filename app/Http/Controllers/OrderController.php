<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Bus;
use App\Driver;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
      $order= DB::table('orders')
        ->join('buses','buses.id','=','orders.bus_id')
        ->join('drivers','drivers.id','=','orders.driver_id')
        ->select('orders.*','drivers.name as name_driver','buses.brand as bus_brand','buses.id as bus_id','drivers.id as driver_id')
        ->get();
      return $order;
    }
    public function add(Request $req){  
      $zero= "0";
      $start=$req->start_rent_date;
  		$total=$req->total_rent_days;
  		$date=date('Y:m:d',strtotime($start.$total.'days'));
      $order = Order::create([
        'contact_name'=>$req->contact_name,
        'contact_phone'=>$req->contact_phone,
        'start_rent_date'=>$req->start_rent_date,
        'total_rent_days'=>$req->total_rent_days,
        'end_rent_date'=>$date,
        'bus_id'=>$req->bus_id,
        'driver_id'=>$req->driver_id
      ]);
      return 'data has been added';
    }
}
