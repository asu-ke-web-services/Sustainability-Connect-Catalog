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
            'affiliationables',
            'affiliations',
            'attachment_statuses',
            'attachment_types',
            'attachments',
            'budget_types',
            'cache',
            'categories',
            'categorisables',
            'failed_jobs',
            'internship_user',
            'internships',
            'jobs',
            'keywordables',
            'keywords',
            'media',
            'notes',
            'opportunity_review_statuses',
            'opportunity_statuses',
            'opportunity_types',
            'organization_statuses',
            'organization_types',
            'organizations',
            'project_user',
            'projects',
            'relationship_types',
            'revisions',
            'sessions',
            'social_accounts',
            'student_degree_levels',
            'user_types',
        ]);
        $this->enableForeignKeys();

        $this->call(CategoriesTableSeeder::class);
        $this->call(KeywordsTableSeeder::class);
        $this->call(RelationshipTypesTableSeeder::class);
        $this->call(StudentDegreeLevelsTableSeeder::class);
        $this->call(UserTypesTableSeeder::class);
        $this->call(OpportunityTypesTableSeeder::class);
        $this->call(AffiliationsTableSeeder::class);

        $this->call(AuthTableSeeder::class);

        $this->call(OpportunityTablesSeeder::class);
        $this->call(ProjectsSeeder::class);
        $this->call(InternshipsSeeder::class);

        $this->call(OrganizationsTableSeeder::class);
        $this->call(OpportunityUsersTablesSeeder::class);

        $this->call(AttachmentStatusesTableSeeder::class);
        $this->call(AttachmentTypesTableSeeder::class);

        $this->call(ProjectFilesSeeder::class);
        $this->call(InternshipFilesSeeder::class);

        Model::reguard();
    }
}
