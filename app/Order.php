<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'date', 'time', 'status','price','del_date','first_name','last_name','email','address','phone','zip','user_id'
    ];
}
