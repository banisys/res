<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    protected $fillable = [
        'personel_id','day', 'month','date',
    ];
    public $timestamps=false;
}
