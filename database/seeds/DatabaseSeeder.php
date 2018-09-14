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
            'addresses',
            'address_opportunity',
            'address_organization',
            'affiliation_opportunity',
            'affiliation_user',
            'affiliations',
            'attachments',
            'budget_types',
            'cache',
            'categories',
            'category_opportunity',
            'failed_jobs',
            'internships',
            'jobs',
            'keyword_opportunity',
            'keyword_user',
            'keywords',
            'media',
            'model_has_permissions',
            'model_has_roles',
            'notes',
            'note_opportunity',
            'note_organization',
            'opportunities',
            'opportunity_organization',
            'opportunity_review_statuses',
            'opportunity_statuses',
            'opportunity_types',
            'opportunity_user',
            'organization_statuses',
            'organization_types',
            'organizations',
            'password_histories',
            'password_resets',
            'permissions',
            'projects',
            'relationship_types',
            'revisions',
            'role_has_permissions',
            'roles',
            'sessions',
            'social_accounts',
            'student_degree_levels',
            'users',
        ]);
        $this->enableForeignKeys();

        $this->call(CategoriesTableSeeder::class);
        $this->call(KeywordsTableSeeder::class);
        $this->call(RelationshipTypesTableSeeder::class);
        $this->call(StudentDegreeLevelsTableSeeder::class);
        $this->call(OpportunityTypesTableSeeder::class);
        $this->call(AffiliationsTableSeeder::class);

        $this->call(AuthTableSeeder::class);

        $this->call(OpportunityTablesSeeder::class);
        $this->call(ProjectsSeeder::class);
        $this->call(InternshipsSeeder::class);

        $this->call(OrganizationsTableSeeder::class);

        Model::reguard();
    }
}
