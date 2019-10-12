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
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        $admin = Role::create(['name' => config('access.users.admin_role')]);
        $worker = Role::create(['name' => 'student_worker']);
        $mentor = Role::create(['name' => 'mentor']);
        $user = Role::create(['name' => config('access.users.default_role')]);

        // Create Permissions
        $permissions = [
            'view personal dashboard',
            'view admin dashboard',
            'manage address',
            'manage attachment',
            'manage authentication',
            'manage lookup',
            'manage internship',
            'manage project',
            'manage organization',
            'manage note',
            'manage role',
            'manage user',
            'create registered user',
            'create unregistered user',
            'read user',
            'update user',
            'delete user',
            'submit project proposal',
            'store project',
            'read public projects',
            'read all projects',
            'update project',
            'delete project',
            'follow project',
            'clone project',
            'add project user',
            'remove project user',
            'store internship',
            'read public internships',
            'read all internships',
            'update internship',
            'delete internship',
            'follow internship',
            'clone internship',
            'add internship user',
            'remove internship user',
            'masquerade as user',
            'upload attachment',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign Permissions to other Roles
        // Note: Admin (User 1) Has all permissions via a gate in the AuthServiceProvider
        // $user->givePermissionTo('view admin dashboard');

        // Assign Permissions to other Roles
        $worker->givePermissionTo(Permission::all());

        $mentor->givePermissionTo(
            'view personal dashboard',
            'submit project proposal',
            'read all internships',
            'read all projects',
            'follow internship',
            'follow project'
        );

        $user->givePermissionTo(
            'view personal dashboard',
            'submit project proposal',
            'read public internships',
            'read public projects',
            'follow internship',
            'follow project'
        );

        $this->enableForeignKeys();
    }
}
