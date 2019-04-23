<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delay extends Model
{
    protected $fillable = [
        'personel_id','time', 'month','date',
    ];
    public $timestamps=false;

    public static function search($data,$personel)
    {
        $delays = Delay::where('personel_id',$personel['id'])->orderby('id', 'DESC');
        if (sizeof($data) > 0) {
            if (array_key_exists('date', $data)) {
                $delays = $delays->where('date', 'like', '%' . $data['date'] . '%');

            }
        }
        $delays = $delays->paginate(10);

        return $delays;
    }
}
