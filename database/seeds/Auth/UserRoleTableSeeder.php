<?php

use Illuminate\Database\Seeder;
use SCCatalog\Models\Auth\User;

/**
 * Class UserRoleTableSeeder.
 */
class UserRoleTableSeeder extends Seeder
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

        $users = User::all();
        foreach($users as $user) {
            switch ($user->login_name) {
                case 'ndrollin':
                case 'susadmin':
                case 'brbarker':
                    $user->assignRole(config('access.users.admin_role'));
                    break;

                case 'pprosser':
                    $user->assignRole('sc_manager');
                    break;

                default:
                    $user->assignRole(config('access.users.default_role'));
            }
        }

        $this->enableForeignKeys();
    }
}
