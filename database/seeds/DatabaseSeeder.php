<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(KeywordsTableSeeder::class);
        $this->call(RelationshipTypesTableSeeder::class);
        $this->call(StudentDegreeLevelsTableSeeder::class);
        // $this->call(AdminUserTableSeeder::class);
        // $this->call(OrganizationsTableSeeder::class);
        $this->call(OpportunityTypesTableSeeder::class);
        $this->call(AffiliationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(OpportunityTablesSeeder::class);
        $this->call(ProjectsSeeder::class);
        $this->call(InternshipsSeeder::class);
        // $this->call(MoreAdminUsersTableSeeder::class);
    }
}
