<?php

namespace App;

use App\Events\userEvent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $dispatchesEvents=["created"=>userEvent::class];

    protected $fillable = [
        'name', 'email', 'password','family','nickname','mobile'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'user_id');
    }

    public function asks()
    {
        return $this->hasMany(Ask::class,'user_id');
    }

    public static function search($data)
    {
        $users = User::orderBy('created_at', 'DESK');

        if (sizeof($data) > 0) {
            if (array_key_exists('email', $data)) {
                $users = $users->where('email', 'like', '%' . $data['email'] . '%');

            }
        }
        $users = $users->paginate(10);

        return $users;

    }

    public function hasRole($role)
    {
        if(is_string($role)) {
            return $this->roles->contains('name' , $role);
        }
//
//        foreach ($role as $r) {
//            if($this->hasRole($r->name)) {
//                return true;
//            }
//        }
//        return false;

        return !! $role->intersect($this->roles)->count(); //اگر اشتراکی بین دو آرایه وجود داشته باشد true وگرنه false
    }


}
