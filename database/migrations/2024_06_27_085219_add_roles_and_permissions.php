<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          // Suppression des permissions
          Permission::where('name', 'create events')->delete();
          Permission::where('name', 'edit events')->delete();
          Permission::where('name', 'delete events')->delete();
          Permission::where('name', 'view events')->delete();

          // Suppression des rôles
          Role::where('name', 'admin')->delete();
          Role::where('name', 'association')->delete();
          Role::where('name', 'user')->delete();
    }
};
