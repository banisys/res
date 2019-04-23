<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    protected $fillable = [
        'personel_id','time', 'month','date',
    ];
    public $timestamps=false;

    public static function search($data,$personel)
    {
        $overtimes = Overtime::where('personel_id',$personel['id'])->orderby('id', 'DESC');
        if (sizeof($data) > 0) {
            if (array_key_exists('date', $data)) {
                $overtimes = $overtimes->where('date', 'like', '%' . $data['date'] . '%');

            }
        }
        $overtimes = $overtimes->paginate(10);

        return $overtimes;
    }
}
