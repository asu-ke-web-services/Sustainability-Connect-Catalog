<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
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
            // 'organization_name'  => $faker->company,
            // 'organization_url'   => $faker->url,
            'phone'              => '480-727-4843',
            'created_at'         => '2014-03-25',
            'updated_at'         => '2014-03-25',
            'created_by' => $faker->numberBetween(1, 80),
            'updated_by' => $faker->numberBetween(1, 80),
        ]);

        // Students
        for ($i = 0; $i < 50; $i++) {
            $userCreatedDate = $faker->dateTimeBetween('- 3 year', 'now');
            DB::table('users')->insert([
                'name' => $faker->firstName . ' ' . $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'remember_token' => str_random(60),
                'type' => 'student',
                // 'asurite' => 1,
                // 'degree_level' => $faker->sentence(3, true),
                // 'degree_program' => $faker->sentence(3, true),
                // 'graduation_date' => $faker->date('Y-m-d', '+ 2 year'),
                // 'organization_name' => $faker->company,
                // 'organization_url' => $faker->url,
                // 'phone' => $faker->phoneNumber,
                // 'research_interests' => $faker->paragraph,
                'created_at' => $userCreatedDate,
                'updated_at' => $userCreatedDate,
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ]);
        }

        // Faculty
        for ($i = 0; $i < 20; $i++) {
            $userCreatedDate = $faker->dateTimeBetween('- 3 year', 'now');
            DB::table('users')->insert([
                'name' => $faker->firstName . ' ' . $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'remember_token' => str_random(60),
                'type' => 'faculty',
                // 'asurite' => 1,
                // 'degree_level' => $faker->sentence(3, true),
                // 'organization_name' => $faker->company,
                // 'organization_url' => $faker->url,
                // 'phone' => $faker->phoneNumber,
                // 'research_interests' => $faker->paragraph,
                'created_at' => $userCreatedDate,
                'updated_at' => $userCreatedDate,
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ]);
        }

        // Staff
        for ($i = 0; $i < 10; $i++) {
            $userCreatedDate = $faker->dateTimeBetween('- 3 year', 'now');
            DB::table('users')->insert([
                'name' => $faker->firstName . ' ' . $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'remember_token' => str_random(60),
                'type' => 'staff',
                // 'asurite' => 1,
                // 'degree_level' => $faker->sentence(3, true),
                // 'degree_program' => $faker->sentence(3, true),
                // 'graduation_date' => $faker->dateTime('+ 2 year'),
                // 'organization_name' => $faker->company,
                // 'organization_url' => $faker->url,
                // 'phone' => $faker->phoneNumber,
                // 'research_interests' => $faker->paragraph,
                'created_at' => $userCreatedDate,
                'updated_at' => $userCreatedDate,
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ]);
        }

        // Community Partner
        for ($i = 0; $i < 30; $i++) {
            $userCreatedDate = $faker->dateTimeBetween('- 3 year', 'now');
            DB::table('users')->insert([
                'name' => $faker->firstName . ' ' . $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'remember_token' => str_random(60),
                'type' => 'partner',
                // 'asurite' => 0,
                // 'degree_level' => $faker->sentence(3, true),
                // 'degree_program' => $faker->sentence(3, true),
                // 'graduation_date' => $faker->dateTime('+ 2 year'),
                // 'organization_name' => $faker->company,
                // 'organization_url' => $faker->url,
                // 'phone' => $faker->phoneNumber,
                // 'research_interests' => $faker->paragraph,
                'created_at' => $userCreatedDate,
                'updated_at' => $userCreatedDate,
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ]);
        }

    }
}
