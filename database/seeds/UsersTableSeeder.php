<?php

use Illuminate\Database\Seeder;
use SCCatalog\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        // $role = Role::where('name', 'admin')->firstOrFail();

        // Students
        for ($i = 0; $i < 50; $i++) {
            $userCreatedDate = $faker->dateTimeBetween('- 3 year', 'now');
            DB::table('users')->insert([
                'name' => $faker->firstName . ' ' . $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'remember_token' => str_random(60),
                'type' => 'student',
                'asurite' => 1,
                'student_degree_level_id' => $faker->numberBetween(1, 5),
                'degree_program' => $faker->sentence(3, true),
                'graduation_date' => $faker->date('Y-m-d', '+ 2 year'),
                'phone' => $faker->phoneNumber,
                'research_interests' => $faker->paragraph,
                'created_at' => $userCreatedDate,
                'updated_at' => $userCreatedDate,
                'created_by'         => 1,
                'updated_by'         => 1,
            ]);

            if ($faker->boolean(60)) {
                DB::table('users_affiliations')->insert([
                    'user_id' => $i + 2,
                    'affiliation_id' => 2,
                    'order' => 1,
                    'created_at' => $faker->dateTime(),
                    'updated_at' => $faker->dateTime(),
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);
            }
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
                'asurite' => 1,
                'department' => $faker->sentence(3, true),
                'phone' => $faker->phoneNumber,
                'research_interests' => $faker->paragraph,
                'created_at' => $userCreatedDate,
                'updated_at' => $userCreatedDate,
                'created_by'         => 1,
                'updated_by'         => 1,
            ]);

            if ($faker->boolean(80)) {
                DB::table('users_affiliations')->insert([
                    'user_id' => $i + 52,
                    'affiliation_id' => 2,
                    'order' => 1,
                    'created_at' => $faker->dateTime(),
                    'updated_at' => $faker->dateTime(),
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);
            }
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
                'asurite' => 1,
                'department' => $faker->sentence(3, true),
                'phone' => $faker->phoneNumber,
                'created_at' => $userCreatedDate,
                'updated_at' => $userCreatedDate,
                'created_by'         => 1,
                'updated_by'         => 1,
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
                'asurite' => 0,
                'organization_id' => $faker->numberBetween(1, 20),
                'phone' => $faker->phoneNumber,
                'research_interests' => $faker->paragraph,
                'created_at' => $userCreatedDate,
                'updated_at' => $userCreatedDate,
                'created_by'         => 1,
                'updated_by'         => 1,
            ]);
        }

    }
}
