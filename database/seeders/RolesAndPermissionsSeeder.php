<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        
        // Création des permissions
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'view events']);
        Permission::create(['name' => 'manage events']);
        Permission::create(['name' => 'manage reservations']);
        Permission::create(['name' => 'create reservations']);
        Permission::create(['name' => 'view reservations']);

        // Création des rôles et attribution des permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(['manage users', 'view events']);

        $association = Role::create(['name' => 'association']);
        $association->givePermissionTo(['manage events', 'manage reservations', 'view reservations']);

        $user = Role::create(['name' => 'user']);
        $user->givePermissionTo(['create reservations', 'view reservations']);
    }
}
