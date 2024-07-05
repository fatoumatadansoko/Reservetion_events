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
        $createEventPermission = Permission::create(['name' => 'create evenement']);
        $editEventPermission = Permission::create(['name' => 'edit evenement']);
        $deleteEventPermission = Permission::create(['name' => 'delete evenement']);
        $viewEventPermission = Permission::create(['name' => 'view evenement']);

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
          Permission::where('name', 'create evenement')->delete();
          Permission::where('name', 'edit evenement')->delete();
          Permission::where('name', 'delete evenement')->delete();
          Permission::where('name', 'view evenement')->delete();

          // Suppression des rôles
          Role::where('name', 'admin')->delete();
          Role::where('name', 'association')->delete();
          Role::where('name', 'user')->delete();
    }
};
