<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name','title'
    ];
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }
    public static function search($data)
    {
        $roles = Role::orderBy('id', 'DESC');
        if (sizeof($data) > 0) {
            if (array_key_exists('title', $data)) {
                $roles = $roles->where('title', 'like', '%' . $data['title'] . '%');
            }
        }
        $roles = $roles->paginate(10);
        return $roles;
    }
}
