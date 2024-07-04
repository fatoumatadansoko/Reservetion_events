<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;

class SetupAdmin extends Command
{
    protected $signature = 'create:admin';

    protected $description = 'Admin créé avec succés';

    public function handle()
    {
        $role = Role::firstOrCreate(['name' => 'admin']);
        // Créer un nouvel utilisateur administrateur
        $adminUser = User::create([
            'nom' => 'Admin User',
            'telephone' => '773162001',
            'photo' => 'photos/admin.jpg',
            'email' => 'admin@  .com', // Changez l'email si nécessaire
            'password' => bcrypt('123456789'), // Changez le mot de passe si nécessaire
        ]);
        Admin::create([
            'user_id' => $adminUser->id,
            'prenom' => 'meblo',
        ]);
        // Assigner le rôle d'admin à l'utilisateur
        $adminUser->assignRole($role);

        $this->info('Admin user créé et le role est assigné avec succés.');

        return 0;
    }
}
