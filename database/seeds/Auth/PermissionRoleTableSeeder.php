<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        $admin = Role::create(['name' => config('access.users.admin_role')]);
        $manager = Role::create(['name' => 'sc_manager']);
        $mentor = Role::create(['name' => 'mentor']);
        $user = Role::create(['name' => config('access.users.default_role')]);

        // Create Permissions
        $permissions = [
            'view personal dashboard',
            'view admin dashboard',
            'view all profiles',
            'update all profiles',
            'create registered user',
            'create unregistered user',
            'read user',
            'update user',
            'delete user',
            'submit project idea',
            'create opportunity',
            'read unrestricted opportunity',
            'read restricted opportunity',
            'update opportunity',
            'delete opportunity',
            'follow opportunity',
            'clone opportunity',
            'add opportunity user',
            'remove opportunity user',
            'create attachment',
            'read attachment',
            'update attachment',
            'delete attachment',
            'publish attachment',
            'create lookup records',
            'read lookup records',
            'update lookup records',
            'delete lookup records',
            'masquerade as user',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
        $admin->givePermissionTo(Permission::all());

        // Assign Permissions to other Roles
        $manager->givePermissionTo(Permission::all());

        $mentor->givePermissionTo(
            'view personal dashboard',
            'submit project idea',
            'read restricted opportunity',
            'follow opportunity',
            'read attachment',
            'read lookup records'
        );

        $user->givePermissionTo(
            'view personal dashboard',
            'submit project idea',
            'read unrestricted opportunity',
            'follow opportunity',
            'read attachment',
            'read lookup records'
        );

        $this->enableForeignKeys();
    }
}
