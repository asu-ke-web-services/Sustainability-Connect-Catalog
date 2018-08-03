<?php

use Carbon\Carbon;
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
        DB::table('affiliation_opportunity')->truncate();
        DB::table('category_opportunity')->truncate();
        DB::table('keyword_opportunity')->truncate();
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

        $listingStartDate = Carbon::now();
        $expirationDate = Carbon::now()->addMonths(3);
        $startDate = Carbon::now()->addMonths(6);
        $endDate = Carbon::now()->addMonths(12);

        // Projects
        for ($i = 0; $i < 100; $i++) {
            DB::table('opportunities')->insert([
                'opportunityable_id' => $i + 101,
                'opportunityable_type' => 'Project',
                'name' => $faker->sentence(3, true),
                'public_name' => $faker->sentence(3, true),
                'slug' => $faker->unique()->slug,
                'opportunity_status_id' => $faker->numberBetween(1, 5),
                'is_hidden' => $faker->boolean(10),
                'summary' => $faker->paragraph(1, true),
                'description' => $faker->paragraph(3, true),
                'start_date' => $startDate,
                'end_date' => $endDate,
                'listing_starts' => $listingStartDate,
                'listing_ends' => $expirationDate,
                'application_deadline' => $expirationDate,
                'organization_id' => $faker->numberBetween(1, 20),
                'submitting_user_id' => $faker->numberBetween(1, 110),
                'supervisor_user_id' => $faker->numberBetween(55, 80),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('projects')->insert([
                'id' => $i + 101,
                'compensation' => $faker->text,
                'responsibilities' => $faker->text,
                'learning_outcomes' => $faker->text,
                'sustainability_contribution' => $faker->text,
                'qualifications' => $faker->text,
                'application_instructions' => $faker->text,
                'implementation_paths' => $faker->text,
                'budget_type' => $faker->text,
                'budget_amount' => $faker->text,
                'program_lead' => $faker->name,
                'success_story' => $faker->url,
                'library_collection' => $faker->url,
                // 'created_at' => $faker->dateTime(),
                // 'updated_at' => $faker->dateTime(),
                // 'created_by' => 1,
                // 'updated_by' => 1,
            ]);

            DB::table('addresses')->insert([
                'addressable_id' => $i + 1,
                'addressable_type' => 'Opportunity',
                'street1' => $faker->buildingNumber . ' ' . $faker->streetName,
                'street2' => $faker->secondaryAddress,
                'city' => $faker->city,
                'state' => $faker->state,
                'postal_code' => $faker->postcode,
                'country' => $faker->country,
                'note' => $faker->sentence,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('notes')->insert([
                'noteable_id' => $i + 1,
                'noteable_type' => 'Opportunity',
                'user_id' => 1,
                'body' => $faker->sentence,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            if ($faker->boolean(30)) {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $i + 1,
                    'affiliation_id' => 1,
                    'order' => 1,
                    'created_at' => $faker->dateTime(),
                    'updated_at' => $faker->dateTime(),
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);
            }

            DB::table('affiliation_opportunity')->insert([
                'opportunity_id' => $i + 1,
                'affiliation_id' => $faker->numberBetween(2, 4),
                'order' => 2,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('affiliation_opportunity')->insert([
                'opportunity_id' => $i + 1,
                'affiliation_id' => $faker->numberBetween(5, 12),
                'order' => 3,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('category_opportunity')->insert([
                'opportunity_id' => $i + 1,
                'category_id' => $faker->numberBetween(1, 6),
                'order' => 1,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('keyword_opportunity')->insert([
                'opportunity_id' => $i + 1,
                'keyword_id' => $faker->numberBetween(1, 61),
                'order' => 1,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('keyword_opportunity')->insert([
                'opportunity_id' => $i + 1,
                'keyword_id' => $faker->numberBetween(1, 61),
                'order' => 2,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }


        // Internships
        for ($i = 0; $i < 100; $i++) {
            DB::table('opportunities')->insert([
                'opportunityable_id' => $i + 201,
                'opportunityable_type' => 'Internship',
                'name' => $faker->sentence(3, true),
                'public_name' => $faker->sentence(3, true),
                'slug' => $faker->unique()->slug,
                'opportunity_status_id' => $faker->numberBetween(7, 8),
                'is_hidden' => $faker->boolean(10),
                'summary' => $faker->paragraph(1, true),
                'description' => $faker->paragraph(3, true),
                'start_date' => $startDate,
                'end_date' => $endDate,
                'listing_starts' => $listingStartDate,
                'listing_ends' => $expirationDate,
                'application_deadline' => $expirationDate,
                'organization_id' => $faker->numberBetween(1, 20),
                'submitting_user_id' => $faker->numberBetween(1, 110),
                'supervisor_user_id' => $faker->numberBetween(55, 80),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('internships')->insert([
                'id' => $i + 201,
                'compensation' => $faker->text,
                'responsibilities' => $faker->text,
                'qualifications' => $faker->text,
                'application_instructions' => $faker->text,
                'program_lead' => $faker->name,
                'success_story' => $faker->url,
                'library_collection' => $faker->url,
                // 'created_at' => $faker->dateTime(),
                // 'updated_at' => $faker->dateTime(),
                // 'created_by' => 1,
                // 'updated_by' => 1,
            ]);

            DB::table('addresses')->insert([
                'addressable_id' => $i + 101,
                'addressable_type' => 'Opportunity',
                'street1' => $faker->buildingNumber . ' ' . $faker->streetName,
                'street2' => $faker->secondaryAddress,
                'city' => $faker->city,
                'state' => $faker->state,
                'postal_code' => $faker->postcode,
                'country' => $faker->country,
                'note' => $faker->sentence,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('notes')->insert([
                'noteable_id' => $i + 101,
                'noteable_type' => 'Opportunity',
                'user_id' => 1,
                'body' => $faker->sentence,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            if ($faker->boolean(30)) {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $i + 101,
                    'affiliation_id' => 1,
                    'order' => 1,
                    'created_at' => $faker->dateTime(),
                    'updated_at' => $faker->dateTime(),
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);
            }

            DB::table('affiliation_opportunity')->insert([
                'opportunity_id' => $i + 101,
                'affiliation_id' => $faker->numberBetween(2, 4),
                'order' => 2,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('affiliation_opportunity')->insert([
                'opportunity_id' => $i + 101,
                'affiliation_id' => $faker->numberBetween(5, 12),
                'order' => 3,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('category_opportunity')->insert([
                'opportunity_id' => $i + 101,
                'category_id' => $faker->numberBetween(1, 6),
                'order' => 1,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('keyword_opportunity')->insert([
                'opportunity_id' => $i + 101,
                'keyword_id' => $faker->numberBetween(1, 61),
                'order' => 1,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('keyword_opportunity')->insert([
                'opportunity_id' => $i + 101,
                'keyword_id' => $faker->numberBetween(1, 61),
                'order' => 2,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}
