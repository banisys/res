<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    protected $fillable = [
        'personel_id','day', 'month','date',
    ];
    public $timestamps=false;
}
