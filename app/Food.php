<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'name',
        'price',
        'offer',
        'image',
        'cat',
        'user_id',
    ];

    public static function search($data)
    {
        $foods = Food::orderby('id', 'DESC');
        if (sizeof($data) > 0) {
            if (array_key_exists('name', $data)) {
                $foods = $foods->where('name', 'like', '%' . $data['name'] . '%')
                    ->where('cat', 'like', '%' . $data['cat'] . '%');
            }
        }
        $foods = $foods->paginate(20);

        return $foods;
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function order_pro()
    {
        return $this->belongsTo(Order_pro::class);
    }


}
