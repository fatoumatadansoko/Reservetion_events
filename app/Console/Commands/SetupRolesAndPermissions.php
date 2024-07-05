<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SetupRolesAndPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup-roles-and-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     */
    public function handle()
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

         $this->info('Roles and permissions have been set up successfully.');

    }
}
