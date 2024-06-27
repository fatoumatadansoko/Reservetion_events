<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Création des rôles
        $adminRole = Role::create(['name' => 'admin']);
        $associationRole = Role::create(['name' => 'association']);
        $userRole = Role::create(['name' => 'user']);

        // Création des permissions
        $createEventPermission = Permission::create(['name' => 'create events']);
        $editEventPermission = Permission::create(['name' => 'edit events']);
        $deleteEventPermission = Permission::create(['name' => 'delete events']);
        $viewEventPermission = Permission::create(['name' => 'view events']);

        // Assignation des permissions aux rôles
        $adminRole->givePermissionTo([$createEventPermission, $editEventPermission, $deleteEventPermission, $viewEventPermission]);
        $associationRole->givePermissionTo([$createEventPermission, $editEventPermission, $viewEventPermission]);
        $userRole->givePermissionTo([$viewEventPermission]);
    }
}

