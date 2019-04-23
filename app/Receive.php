<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
    protected $fillable = [
        'personel_id','amount', 'month','date',
    ];

    public static function search($data,$personel)
    {
        $receives = Receive::where('personel_id',$personel['id'])->orderby('id', 'DESC');
        if (sizeof($data) > 0) {
            if (array_key_exists('date', $data)) {
                $receives = $receives->where('date', 'like', '%' . $data['date'] . '%');

            }
        }
        $receives = $receives->paginate(10);

        return $receives;
    }
}
