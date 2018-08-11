<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\User;

class MoreAdminUsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $faker = Faker\Factory::create();

        // Create Admin
        DB::table('users')->insert([
            'name'               => 'Sydney Lines',
            'email'              => 'sydney.lines@asu.edu',
            'password'           => bcrypt('secret'),
            'remember_token'     => str_random(60),
            //'role_id'            => $role->id,
            'type'               => 'staff',
            'asurite'            => 1,
            'phone'              => '',
            'created_at'         => '2014-03-25',
            'updated_at'         => '2014-03-25',
            'created_by'         => 1,
            'updated_by'         => 1,
        ]);

        DB::table('users')->insert([
            'name'               => 'Paul Prosser',
            'email'              => 'paul.prosser@asu.edu',
            'password'           => bcrypt('secret'),
            'remember_token'     => str_random(60),
            //'role_id'            => $role->id,
            'type'               => 'staff',
            'asurite'            => 1,
            'phone'              => '',
            'created_at'         => '2014-03-25',
            'updated_at'         => '2014-03-25',
            'created_by'         => 1,
            'updated_by'         => 1,
        ]);

        DB::table('users')->insert([
            'name'               => 'Caroline Harrison',
            'email'              => 'caroline.harrison@asu.edu',
            'password'           => bcrypt('secret'),
            'remember_token'     => str_random(60),
            //'role_id'            => $role->id,
            'type'               => 'staff',
            'asurite'            => 1,
            'phone'              => '',
            'created_at'         => '2014-03-25',
            'updated_at'         => '2014-03-25',
            'created_by'         => 1,
            'updated_by'         => 1,
        ]);

        DB::table('users')->insert([
            'name'               => 'Caroline Savalle',
            'email'              => 'caroline.savalle@asu.edu',
            'password'           => bcrypt('secret'),
            'remember_token'     => str_random(60),
            //'role_id'            => $role->id,
            'type'               => 'staff',
            'asurite'            => 1,
            'phone'              => '',
            'created_at'         => '2014-03-25',
            'updated_at'         => '2014-03-25',
            'created_by'         => 1,
            'updated_by'         => 1,
        ]);


        DB::table('users')->insert([
            'name'               => 'Philip Tarrant',
            'email'              => 'philip.tarrant@asu.edu',
            'password'           => bcrypt('secret'),
            'remember_token'     => str_random(60),
            //'role_id'            => $role->id,
            'type'               => 'staff',
            'asurite'            => 1,
            'phone'              => '',
            'created_at'         => '2014-03-25',
            'updated_at'         => '2014-03-25',
            'created_by'         => 1,
            'updated_by'         => 1,
        ]);
    }
}
