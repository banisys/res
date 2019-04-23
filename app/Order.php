<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [

        'name',
        'mobile',
        'status',
        'lat',
        'lon',
        'address',
        'payment',
        'refid',
        'authority',
        'amount',
        'read',
        'factor_id',
        'month',
    ];

    public function order_pro()
    {
        return $this->hasMany(Order_pro::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function search($data)
    {

        $orders = Order::orderby('id', 'DESC');

        if (sizeof($data) > 0) {
            if (array_key_exists('factor_id', $data)) {
                $orders = $orders->where('factor_id', 'like', '%' . $data['factor_id'] . '%');
            }
        }
        $orders = $orders->paginate(20);

        return $orders;
    }

}
