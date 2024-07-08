<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(10);
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->route('users.index')->with('success', 'Permission créée avec succès.');
    }
    public function destroy(Permission $permission){
        $permission->delete();
        return redirect()->back()->with('success', 'permission supprimé avec succès.');
    }
    public function indexA()
    {
        $users = User::with('permissions', 'roles')->get();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('permissions.permission', compact('users', 'roles', 'permissions'));
    }

    public function assign(Request $request)
    {
        $user = User::find($request->user_id);
        $permission = Permission::findByName($request->permission);

        if ($request->type == 'role') {
            $user->assignRole($permission);
        } else {
            $user->givePermissionTo($permission);
        }

        return redirect()->route('permissions.permission')->with('success', 'Permission assigned successfully');
    }

    public function revoke(Request $request)
    {
        $user = User::find($request->user_id);
        $permission = Permission::findByName($request->permission);

        if ($request->type == 'role') {
            $user->removeRole($permission);
        } else {
            $user->revokePermissionTo($permission);
        }

        return redirect()->route('permissions')->with('success', 'Permission revoked successfully');
    }
}
