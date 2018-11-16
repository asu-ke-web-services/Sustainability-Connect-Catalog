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
                case 'pprosser':
                case 'cdonnel':
                case 'cjharri1':
                    $user->assignRole(config('access.users.admin_role'));
                    break;

                case 'ebrunda':
                    $user->assignRole('student_worker');
                    break;

                default:
                    $user->assignRole(config('access.users.default_role'));
            }
        }

        $this->enableForeignKeys();
    }
}
