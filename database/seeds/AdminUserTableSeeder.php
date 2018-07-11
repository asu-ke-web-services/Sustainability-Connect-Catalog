<?php

use Illuminate\Database\Seeder;
use SCCatalog\Models\User;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create();
        // $role = Role::where('name', 'admin')->firstOrFail();

        // Create Admin
        DB::table('users')->insert([
            'name'               => 'Nathan Rollins',
            'email'              => 'nathan.rollins@asu.edu',
            'password'           => bcrypt('secret'),
            'remember_token'     => str_random(60),
            //'role_id'            => $role->id,
            'type'               => 'staff',
            'asurite'            => 1,
            'phone'              => '480-727-4843',
            'created_at'         => '2014-03-25',
            'updated_at'         => '2014-03-25',
            'created_by'         => 1,
            'updated_by'         => 1,
        ]);
    }
}
