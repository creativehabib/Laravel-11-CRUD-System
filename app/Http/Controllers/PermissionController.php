<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::latest()->paginate(10);
        return view('permissions.index',compact('permissions'));
    }

    public function create(){
        return view('permissions.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required|min:3|unique:permissions,name',
        ]);

        Permission::create( [
            'name' => Str::lower( $request->name ),
        ] );

        return redirect()->route('permissions.index');
    }


    public function edit(Permission $permission){
        $roles = Role::all();
        return view('permissions.edit',compact('permission','roles'));
    }

    public function update(Request $request, Permission $permission){
        $validate = $request->validate( [
            'name' => "required|min:3|unique:permissions,name, $permission->id"
        ] );

        $permission->update([
            'name' => Str::lower( $request->name ),
        ]);

        return redirect()->route( 'permissions.index' );
    }

    public function destroy(Permission $permission){
        $permission->delete();

        return redirect()->back();
    }

}
