<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }

    public function create(){
        return view('roles.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3|unique:roles,name',
        ]);

        Role::create( [
            'name' => Str::lower( $request->name ),
        ] );

        return redirect()->route('roles.index');
    }

    public function edit(Role $role){
        $permissions = Permission::all();
        return view( 'roles.edit', compact( 'role','permissions' ) );
    }

    public function update(Request $request, Role $role){
        $request->validate( [
            'name' => "required|min:3|unique:roles,name, $role->id",
        ] );

        $role->update( [
            'name' => Str::lower( $request->name ),
        ] );

        session()->flash( 'success', 'Role updated successfully' );

        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->back();
    }

    public function givePermissions(Request $request, Role $role){
        if($role->hasPermissionTo($request->permission)){
            return back()->with('message', 'Permission exists');
        }

        $role->givePermissionTo($request->permission);
        return back()->with( 'message', 'Permission added' );
    }

    public function revokePermissions(Role $role, Permission $permission){
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission exists.');
    }
}
