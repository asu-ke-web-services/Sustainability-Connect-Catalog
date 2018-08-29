<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->disableForeignKeys();

        $this->truncateMultiple([
            'cache',
            'jobs',
            'sessions',
            'affiliations',
            'categories',
            'keywords',
            'addresses',
            'opportunity_statuses',
            'opportunities',
            'affiliation_opportunity',
            'category_opportunity',
            'keyword_opportunity',
            'projects',
            'internships',
            'opportunity_types',
            'organization_statuses',
            'organization_types',
            'organizations',
            'relationship_types',
            'student_degree_levels',
        ]);
        $this->enableForeignKeys();

        $this->call(CategoriesTableSeeder::class);
        $this->call(KeywordsTableSeeder::class);
        $this->call(RelationshipTypesTableSeeder::class);
        $this->call(StudentDegreeLevelsTableSeeder::class);
        // $this->call(OrganizationsTableSeeder::class);
        $this->call(OpportunityTypesTableSeeder::class);
        $this->call(AffiliationsTableSeeder::class);

        $this->call(AuthTableSeeder::class);

        $this->call(OpportunityTablesSeeder::class);
        $this->call(ProjectsSeeder::class);
        $this->call(InternshipsSeeder::class);

        Model::reguard();
    }
}
