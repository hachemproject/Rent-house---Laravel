<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:role-list|role-create|role-edit|role-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:role-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:role-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:role-delete'], ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
       /* $role = Role::get();
        $superAdminCount = User::with('roles')->get()->filter(
            fn ($user) => $user->roles->where('name', 'Admin')->toArray()
        )->count();*/
        $role = Role::withCount('users')->get(); // Retrieve roles with user count

        //return$role;
        
       // return view('dashboard.admin.roles.index', ['role' => $role]);
        return view('dashbord.roles.index', compact('role'));
    }

    public function create()
    {
        $permission = Permission::get();
        //return view('roles.create', compact('permission'));
        return view('dashbord.roles.create',compact('permission'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        
        $permissions = [];
        $post_permissions = $request->input('permission');
        foreach ($post_permissions as $key => $val) {
            $permissions[intval($val)] = intval($val);
        }
        $role->syncPermissions($permissions);
        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();
        return view('dashbord.roles.show', compact('role', 'rolePermissions'));
    }

    public function edit($id)
    {
            $role = Role::find($id);
            $permission = Permission::get();
            $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
                ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                ->all();
                return view('dashbord.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

       // $role->syncPermissions($request->input('permission'));

        $post_permissions = $request->input('permission');
        foreach ($post_permissions as $key => $val) {
            $permissions[intval($val)] = intval($val);
        }
        $role->syncPermissions($permissions);
        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }


    
    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
