<?php

use Illuminate\Database\Seeder;
use SCCatalog\Models\OpportunityStatus;
use SCCatalog\Models\OpportunityType;

class OpportunityTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('opportunity_statuses')->truncate();
        DB::table('opportunities')->truncate();
        DB::table('opportunities_addresses')->truncate();
        DB::table('opportunities_affiliations')->truncate();
        DB::table('opportunities_categories')->truncate();
        DB::table('opportunities_keywords')->truncate();
        DB::table('opportunities_notes')->truncate();
        DB::table('projects')->truncate();
        DB::table('internships')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create();

        // Pre-fill Opportunity Status options

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'idea-submission',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
            	'order' => 1,
            	'opportunity_type_id' => 1,
                'name' => 'Idea Submission',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'closed',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
            	'order' => 2,
            	'opportunity_type_id' => 1,
                'name' => 'Archived/Closed',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'seeking-champion',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
            	'order' => 3,
            	'opportunity_type_id' => 1,
                'name' => 'Seeking Champion',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'recruiting',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
            	'order' => 4,
            	'opportunity_type_id' => 1,
                'name' => 'Recruiting Participants',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'in-progress',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
            	'order' => 5,
            	'opportunity_type_id' => 1,
                'name' => 'In Progress',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'completed',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
            	'order' => 6,
            	'opportunity_type_id' => 1,
                'name' => 'Completed',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'inactive',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
            	'order' => 1,
            	'opportunity_type_id' => 2,
                'name' => 'Inactive',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'active',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
            	'order' => 2,
            	'opportunity_type_id' => 2,
                'name' => 'Active',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }


        $faker = Faker\Factory::create();

        // Projects
        for ($i = 0; $i < 100; $i++) {
            $expirationDate = $faker->date('Y-m-d', '+ 1 year');

            DB::table('opportunities')->insert([
                'opportunityable_id' => $i + 1,
                'opportunityable_type' => 'Project',
                'title' => $faker->sentence(3, true),
                'alt_title' => $faker->sentence(3, true),
                'slug' => $faker->unique()->slug,
                'opportunity_status_id' => $faker->numberBetween(1, 5),
                'hidden' => $faker->boolean(10),
                'summary' => $faker->paragraph(1, true),
                'description' => $faker->paragraph(3, true),
                'listing_expires' => $expirationDate,
                'application_deadline' => $expirationDate,
                'organization_id' => $faker->numberBetween(1, 20),
                'submitting_user_id' => $faker->numberBetween(1, 110),
                'owner_user_id' => $faker->numberBetween(55, 80),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('projects')->insert([
                'compensation' => $faker->text,
                'responsibilities' => $faker->text,
                'learning_outcomes' => $faker->text,
                'sustainability_contribution' => $faker->text,
                'qualifications' => $faker->text,
                'application_overview' => $faker->text,
                'implementation_paths' => $faker->text,
            ]);

            DB::table('opportunities_addresses')->insert([
                'opportunity_id' => $i + 1,
                'address_id' => $i + 1,
                'primary' => $faker->boolean(90),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('opportunities_notes')->insert([
                'opportunity_id' => $i + 1,
                'user_id' => $faker->numberBetween(55, 80),
                'note_id' => $i + 1,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            if ($faker->boolean(30)) {
                DB::table('opportunities_affiliations')->insert([
                    'opportunity_id' => $i + 1,
                    'affiliation_id' => 1,
                    'order' => 1,
                    'created_at' => $faker->dateTime(),
                    'updated_at' => $faker->dateTime(),
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);
            }

            DB::table('opportunities_affiliations')->insert([
                'opportunity_id' => $i + 1,
                'affiliation_id' => $faker->numberBetween(2, 4),
                'order' => 2,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('opportunities_affiliations')->insert([
                'opportunity_id' => $i + 1,
                'affiliation_id' => $faker->numberBetween(5, 12),
                'order' => 3,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('opportunities_categories')->insert([
                'opportunity_id' => $i + 1,
                'category_id' => $faker->numberBetween(1, 17),
                'order' => 1,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('opportunities_keywords')->insert([
                'opportunity_id' => $i + 1,
                'keyword_id' => $faker->numberBetween(1, 24),
                'order' => 1,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }


        // Internships
        for ($i = 0; $i < 100; $i++) {
            $expirationDate = $faker->date('Y-m-d', '+ 1 year');

            DB::table('opportunities')->insert([
                'opportunityable_id' => $i + 1,
                'opportunityable_type' => 'Internship',
                'title' => $faker->sentence(3, true),
                'alt_title' => $faker->sentence(3, true),
                'slug' => $faker->unique()->slug,
                'opportunity_status_id' => $faker->numberBetween(7, 8),
                'hidden' => $faker->boolean(10),
                'summary' => $faker->paragraph(1, true),
                'description' => $faker->paragraph(3, true),
                'listing_expires' => $expirationDate,
                'application_deadline' => $expirationDate,
                'organization_id' => $faker->numberBetween(1, 20),
                'submitting_user_id' => $faker->numberBetween(1, 110),
                'owner_user_id' => $faker->numberBetween(55, 80),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('internships')->insert([
                'compensation' => $faker->text,
                'responsibilities' => $faker->text,
                'qualifications' => $faker->text,
                'application_instructions' => $faker->text,
                'comments' => $faker->text,
                'program_lead' => $faker->name,
                'success_story' => $faker->url,
                'library_collection' => $faker->url,
                'publish_on' => $faker->date('Y-m-d', '+ 1 year'),
                'publish_until' => $faker->date('Y-m-d', '+ 1 year')
            ]);

            DB::table('opportunities_addresses')->insert([
                'opportunity_id' => $i + 101,
                'address_id' => $i + 101,
                'primary' => $faker->boolean(90),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('opportunities_notes')->insert([
                'opportunity_id' => $i + 101,
                'user_id' => $faker->numberBetween(55, 80),
                'note_id' => $i + 101,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            if ($faker->boolean(30)) {
                DB::table('opportunities_affiliations')->insert([
                    'opportunity_id' => $i + 101,
                    'affiliation_id' => 1,
                    'order' => 1,
                    'created_at' => $faker->dateTime(),
                    'updated_at' => $faker->dateTime(),
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);
            }

            DB::table('opportunities_affiliations')->insert([
                'opportunity_id' => $i + 101,
                'affiliation_id' => $faker->numberBetween(2, 4),
                'order' => 2,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('opportunities_affiliations')->insert([
                'opportunity_id' => $i + 101,
                'affiliation_id' => $faker->numberBetween(5, 12),
                'order' => 3,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('opportunities_categories')->insert([
                'opportunity_id' => $i + 101,
                'category_id' => $faker->numberBetween(1, 17),
                'order' => 1,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('opportunities_keywords')->insert([
                'opportunity_id' => $i + 101,
                'keyword_id' => $faker->numberBetween(1, 24),
                'order' => 1,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }

        for ($i = 0; $i < 100; $i++) {
            DB::table('opportunities_notes')->insert([
                'opportunity_id' => $i + 101,
                'user_id' => $faker->numberBetween(55, 80),
                'note_id' => $i + 101,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}
