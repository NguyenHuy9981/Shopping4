<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    function index() {
        $users = User::paginate();
        return view('admin.user.index', compact('users'));
    }

    function create() {
        $roles = Role::all();
        
        return view('admin.user.create', compact('roles'));

    }

    function store(Request $request) {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        
        $user->roles()->attach($request['roles_id']);

        return redirect(route('admin.user.index'));

    }

    function edit(Request $request, $id) {
        $user = User::find($id);

        $roles = Role::all();
        
        return view('admin.user.edit', compact('user', 'roles',));
    }

    function update(Request $request, $id) {
        
        $user = User::find($id); //lấy user update vì ->update trả về true-false chứ ko trả về chính product đang sửa
        $user->roles()->sync($request['roles_id']);

        return redirect(route('admin.user.index'));

    }

    function delete($id) {

        $user = User::find($id)->delete();
        return response()->json([
            'Huy' => 'Beautifull',
            'message' => 'success',
            
        ], 200);
        

    }
}
