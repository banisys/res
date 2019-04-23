<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'title'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public static function search($data)
    {
        $permissions = Permission::orderBy('id', 'DESC');
        if (sizeof($data) > 0) {
            if (array_key_exists('title', $data)) {
                $permissions = $permissions->where('title', 'like', '%' . $data['title'] . '%');
            }
        }
        $permissions = $permissions->paginate(10);
        return $permissions;
    }

}
