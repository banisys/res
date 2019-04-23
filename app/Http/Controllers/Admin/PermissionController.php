<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends AdminController
{

    public function index(Request $request)
    {
        $permissions = Permission::search($request->all());
        if (sizeof($permissions) == 0) $x = 0;
        else $x = 1;
        return view('admin.permission.index',compact('permissions','x'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {

        $this->validate(request(),[
            'name'=>'required',
            'title'=>'required',
        ]);

        permission::create([
            'name'=>$request['name'],
            'title'=>$request['title'],
        ]);
        session()->flash('store', 'successful');
        return redirect(route('permission.create'));
    }

    public function show(Permission $permission)
    {
       // 
    }

    public function edit(Permission $permission)
    {
        return view('admin.permission.edit',compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $data=$request->all();
        $permission->update($data);
        return redirect(route('permission.index'));
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect(route('permission.index'));
    }
}
