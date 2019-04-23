<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends AdminController
{

    public function index(Request $request)
    {
        $users = User::search($request->all());
        if (sizeof($users) == 0) $x = 0;
        else $x = 1;

        return view('admin.user.index', compact('users', 'x'));

    }

    public function edit(User $user)
    {
        $roles = Role::get();
        $selects=$user->roles;
        return view('admin.user.edit', compact('user', 'roles','selects'));
    }

    public function update(Request $request, User $user)
    {
        DB::table('role_user')->where('user_id', $user['id'])->delete();
        $user->roles()->sync($request->role_id);

        $data = $request->all();
        $user->update($data);

        return redirect(route('user.index'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('user.index'));

    }


    public function create()
    {
        $roles = Role::latest()->get();
        Auth::logout();
        return view('admin.user.create',compact('roles'));
    }

    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        //
    }


}
