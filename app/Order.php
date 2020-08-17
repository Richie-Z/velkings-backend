<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table= ('orders');
    protected $fillable = ['contact_name','contact_phone','start_rent_date','total_rent_days','end_rent_date','bus_id','driver_id'];
}
