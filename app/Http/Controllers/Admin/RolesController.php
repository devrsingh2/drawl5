<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\RolePermission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RolesController extends Controller
{
    //
    public function index()
    {
        $items = Role::all()
            ->except([3,4]);
        return view('tenant.admin.roles.index', compact('items'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('tenant.admin.roles.create', compact('permissions'));
    }

    public function storeRole(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'name' => 'required',
                'status' => 'required',
                'permissions' => 'required_without_all'
            ]
        );
        $role = new Role();
        $role->name = $request->name;
        $role->status = $request->status;
        $role->save();

        $permission_ids = $request->permissions;
        if (isset($permission_ids) && count($permission_ids) > 0) {
            foreach ($permission_ids as $new_per) {
                $new_permission = new RolePermission;
                $new_permission->role_id = $role->id;
                $new_permission->permission_id = $new_per;
                $new_permission->save();
            }
        }
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Role has been created successfully.');
        return redirect(route('roles.list'));
    }

    public function edit($id)
    {
        $item = Role::findOrFail($id);
        $arr_role_permission = [];
        $user_permission = $item->hasPermission;
        foreach ($user_permission as $key => $value) {
            $arr_role_permission[] = $user_permission{$key}->getPermission->id;
        }
//        dd($arr_role_permission);
        $permissions = Permission::where('status','active')->orderBy('id','ASC')->get();
        return view('tenant.admin.roles.edit', compact('item', 'permissions', 'arr_role_permission'));
    }

    public function updateRole(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'name' => 'required',
                'status' => 'required',
                'permissions' => 'required_without_all'
            ]
        );
        $role = Role::find($request->edit_id);
        $role->name = $request->name;
        $role->status = $request->status;
        $role->save();

        $users_all_permissions = RolePermission::where('role_id', $role->id)->get();
        if (isset($users_all_permissions) && count($users_all_permissions) > 0) {
            foreach ($users_all_permissions as $del) {
                $del->delete();
            }
        }

        $permission_ids = $request->permissions;
        if (isset($permission_ids) && count($permission_ids) > 0) {
            foreach ($permission_ids as $new_per) {
                $new_permission = new RolePermission;
                $new_permission->role_id = $role->id;
                $new_permission->permission_id = $new_per;
                $new_permission->save();
            }
        }
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Role has been updated successfully.');
        return redirect(route('roles.list'));
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);
        $role->delete();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Role deleted successfully.');
        return redirect(route('roles.list'));
    }

}
