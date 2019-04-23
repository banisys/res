<?php

namespace App\Http\Controllers\Admin;


use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends AdminController
{

    public function index(Request $request)
    {
        $roles = Role::search($request->all());
        if (sizeof($roles) == 0) $x = 0;
        else $x = 1;

        return view('admin.role.index', compact('roles', 'x'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::get();
        $selects=$role->permissions;

        return view('admin.role.edit', compact('role', 'permissions','selects'));
    }

    public function update(Request $request, Role $role)
    {
        DB::table('permission_role')->where('role_id', $role['id'])->delete();
        $role->permissions()->sync($request->input('permission_id'));

        $data = $request->all();
        $role->update($data);

        return redirect(route('role.index'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
        ]);

        $role = Role::create([
            'name' => $request['name'],
            'title' => $request['title'],
        ]);
        session()->flash('store', 'successful');
        $role->permissions()->sync($request['permission_id']);

        return redirect(route('role.create'));
    }


    public function destroy(Role $role)
    {
        $role->delete();

        return redirect(route('role.index'));
    }

    public function create()
    {
        $permissions = Permission::latest()->get();

        return view('admin.role.create', compact('permissions'));
    }

    public function show($id)
    {
        //
    }
}
