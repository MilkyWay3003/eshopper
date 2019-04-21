<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    //
    protected $fillable = [
       'item_id','order_id','item_name','item_price'
    ];

}
