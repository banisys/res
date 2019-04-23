<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'cookie', 'num','food_id',
    ];

    public $timestamps=false;

    public function food()
    {
        return $this->hasOne(Food::class,'id','food_id');
    }
}
