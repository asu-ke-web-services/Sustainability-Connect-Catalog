<?php

namespace Tests;

use SCCatalog\Models\Auth\Role;
use SCCatalog\Models\Auth\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Create the admin role or return it if it already exists.
     *
     * @return mixed
     */
    protected function getAdminRole()
    {
        if ($role = Role::whereName(config('access.users.admin_role'))->first()) {
            return $role;
        }

        $adminRole = factory(Role::class)->create(['name' => config('access.users.admin_role')]);

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

        $adminRole->givePermissionTo(Permission::all());

        return $adminRole;
    }

    /**
     * Create an administrator.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    protected function createAdmin(array $attributes = [])
    {
        $adminRole = $this->getAdminRole();
        $admin = factory(User::class)->create($attributes);
        $admin->assignRole($adminRole);

        return $admin;
    }

    /**
     * Login the given administrator or create the first if none supplied.
     *
     * @param bool $admin
     *
     * @return bool|mixed
     */
    protected function loginAsAdmin($admin = false)
    {
        if (! $admin) {
            $admin = $this->createAdmin();
        }

        $this->actingAs($admin);

        return $admin;
    }
}
