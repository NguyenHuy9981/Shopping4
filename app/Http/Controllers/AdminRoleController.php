<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    function index() {
        $roles = Role::paginate();
        return view('admin.role.index', compact('roles'));
        
    }

    function create() {
        
        $permissions = Permission::where('parent_id', 0)->get();

        return view('admin.role.create', compact('permissions'));

    }

    function store(Request $request) {
        
        $role = Role::create([
            'name' => $request['name'],
            'display_name' => $request['name'],
            
        ]);
        $role->permission()->attach($request['permissionOfRole']);

        return redirect(route('role.index'));

    }

    function edit($id) {
        $role = Role::find($id);
        $permissions = Permission::where('parent_id', 0)->get();
        
        return view('admin.role.edit', compact('role', 'permissions'));

    }

    function update(Request $request, $id) {

        $role = Role::find($id);
        $role->update([
            'name' => $request['name'],
            'display_name' => $request['name'],
            
        ]);
        
        $role->permission()->sync($request['permissionOfRole']);

        return redirect(route('role.index'));

    }
}
