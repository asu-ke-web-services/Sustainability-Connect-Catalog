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
        $this->call(StudentDegreeLevelsTableSeeder::class);
        $this->call(AdminUserTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(NotesTableSeeder::class);
        $this->call(OrganizationsTableSeeder::class);
        $this->call(OpportunityTypesTableSeeder::class);
        $this->call(AffiliationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(OrganizationNotesTableSeeder::class);
        $this->call(OpportunityTablesSeeder::class);
    }
}
