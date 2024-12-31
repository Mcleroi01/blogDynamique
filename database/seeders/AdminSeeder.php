<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {

        $user = User::firstOrCreate(
            ['email' => 'fuite243@infoSupport.com'],
            [
                'name' => 'fuite infoSupport',
                'password' => bcrypt('12345678'),
            ]
        );

        // Vérifiez que les permissions du rôle sont correctement définies.
        $role = Role::firstOrCreate(['name' => 'admin']);
        $permissions = Permission::all(); // Assurez-vous que les permissions existent
        $role->syncPermissions($permissions);

        // Assignez le rôle admin à l'utilisateur
        $user->assignRole($role);
        $this->command->info('Super Admin créé avec succès et rôle assigné.');

    }
}
