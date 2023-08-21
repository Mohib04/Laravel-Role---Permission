<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermissionsController extends Controller
{
    //Roles Reated Methods
    public function roleCreate()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('create-roles', compact('roles', 'permissions'));
    }

    public function storeRole(Request $request)
    {
        $roleName = $request->role_name;
        $existingRole = Role::where('name', $roleName)->first();
        if($existingRole){
            return redirect()->back()->with('exist', 'already exists.');
        }else {
            Role::create(['name' => $request->role_name]);
            return redirect()->back()->with('success', 'Role successfully');
        }
    }
    public function roleEdit($id)
    {
        $role = Role::findOrFail($id);
        return view('role-edit', compact('role'));
    }
    public function roleUpdate(Request $request, Role $role)
    {
        $updateRole = $request->validate(['name' => ['required']]);
        $role->update($updateRole);
        return redirect()->route('create-roles')->with('success', 'Role successfully');
    }
    public function roleDelete (Request $request, Role $role)
    {
        $role->delete($request->name);
        return redirect()->route('create-roles')->with('danger', 'Role successfully');
    }

    //Permission Reated Methods
    public function permissionCreate()
    {
        $permissions = Permission::all();
        return view('create-permissions', compact('permissions'));
    }

   
    public function storePermission(Request $request)
    {
        if($request->has('permission_name')) {
            Permission::create(['name' => $request->permission_name]);
            return redirect()->back()->with('success', 'Permission created successfully');
        }
    }

    //Asign Permission
    public function assignPermissions(Request $request)
    {
         $role = Role::findOrFail($request->input('role_id'));
        $permissions = $request->input('permissions', []);

        $role->permissions()->sync($permissions);

        return redirect()->back();
    }
    
}
