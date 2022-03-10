<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    function index() {
        $permissions = Permission::paginate();
        return view('admin.permission.index', compact('permissions'));
    }

    function create() {
        $permissions = Permission::all();
        $permissionRecusive =  new Recusive($permissions);
        $htmlOption = $permissionRecusive->categoryRecusive();
        return view('admin.permission.create', compact('htmlOption'));
    }


    function store(Request $request) {

        if(!empty($request['name'])) {

            Permission::create([
                'name' => $request['name'],
                'display_name' => $request['name'],
                'parent_id' => $request['parent_id'],
            ]);

            return redirect( route('permission.index') );

        } abort(404);

        

        
    }
}
