<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personel extends Model
{
    protected $fillable = [
        'name','dad','address','tel','cel','supporter_name','supporter_tel','image','scan','meli','task',
    ];

    public static function search($data)
    {
        $personels = Personel::orderby('id', 'DESC');
        if (sizeof($data) > 0) {
            if (array_key_exists('name', $data)) {
                $personels = $personels->where('name', 'like', '%' . $data['name'] . '%')
                    ->where('task', 'like', '%' . $data['task'] . '%');
            }
        }
        $personels = $personels->paginate(20);

        return $personels;
    }

}
