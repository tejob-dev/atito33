<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list communes']);
        Permission::create(['name' => 'view communes']);
        Permission::create(['name' => 'create communes']);
        Permission::create(['name' => 'update communes']);
        Permission::create(['name' => 'delete communes']);

        Permission::create(['name' => 'list comptes']);
        Permission::create(['name' => 'view comptes']);
        Permission::create(['name' => 'create comptes']);
        Permission::create(['name' => 'update comptes']);
        Permission::create(['name' => 'delete comptes']);

        Permission::create(['name' => 'list photossalles']);
        Permission::create(['name' => 'view photossalles']);
        Permission::create(['name' => 'create photossalles']);
        Permission::create(['name' => 'update photossalles']);
        Permission::create(['name' => 'delete photossalles']);

        Permission::create(['name' => 'list quartiers']);
        Permission::create(['name' => 'view quartiers']);
        Permission::create(['name' => 'create quartiers']);
        Permission::create(['name' => 'update quartiers']);
        Permission::create(['name' => 'delete quartiers']);

        Permission::create(['name' => 'list salles']);
        Permission::create(['name' => 'view salles']);
        Permission::create(['name' => 'create salles']);
        Permission::create(['name' => 'update salles']);
        Permission::create(['name' => 'delete salles']);

        Permission::create(['name' => 'list textejours']);
        Permission::create(['name' => 'view textejours']);
        Permission::create(['name' => 'create textejours']);
        Permission::create(['name' => 'update textejours']);
        Permission::create(['name' => 'delete textejours']);

        Permission::create(['name' => 'list typesalles']);
        Permission::create(['name' => 'view typesalles']);
        Permission::create(['name' => 'create typesalles']);
        Permission::create(['name' => 'update typesalles']);
        Permission::create(['name' => 'delete typesalles']);

        Permission::create(['name' => 'list videosalles']);
        Permission::create(['name' => 'view videosalles']);
        Permission::create(['name' => 'create videosalles']);
        Permission::create(['name' => 'update videosalles']);
        Permission::create(['name' => 'delete videosalles']);

        Permission::create(['name' => 'list villes']);
        Permission::create(['name' => 'view villes']);
        Permission::create(['name' => 'create villes']);
        Permission::create(['name' => 'update villes']);
        Permission::create(['name' => 'delete villes']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
