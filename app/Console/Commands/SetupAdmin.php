<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;

class SetupAdmin extends Command
{
    protected $signature = 'setup:admin';

    protected $description = 'Setup admin role for user';

    public function handle()
    {
        // Récupérer l'utilisateur existant (admin)
        $adminUser = User::find(5);

        if ($adminUser) {
            // Assigner le rôle d'admin à l'utilisateur
            $adminUser->assignRole('admin');
            $this->info('Admin role assigned successfully to the user.');
        } else {
            $this->error('Admin user not found.');
        }
    }
}
