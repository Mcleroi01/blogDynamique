<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Liste des permissions
        $permissions = [
            'create articles',
            'edit articles',
            'delete articles',
            'publish articles',
            'view statistics',
            'manage users',
        ];

        // Création des permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Création des rôles
        $admin = Role::create(['name' => 'admin']);
        $editor = Role::create(['name' => 'editor']);
        $viewer = Role::create(['name' => 'viewer']);

        // Attribution des permissions aux rôles
        $admin->givePermissionTo($permissions);
        $editor->givePermissionTo(['create articles', 'edit articles', 'publish articles']);
        $viewer->givePermissionTo(['view statistics']);
    }
}
