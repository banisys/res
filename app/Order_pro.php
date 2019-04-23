<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_pro extends Model
{
    protected $fillable = [
        'food_id',
        'num',
        'order_id',
    ];

    public $timestamps=false;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function food()
    {
        return $this->hasOne(Food::class, 'id','food_id');
    }


}
