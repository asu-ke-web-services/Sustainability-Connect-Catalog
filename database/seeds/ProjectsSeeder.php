<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Address;
use SCCatalog\Models\Project;
use SCCatalog\Models\Opportunity;
use SCCatalog\Models\OpportunityStatus;
use SCCatalog\Models\OpportunityType;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Import old Projects data

        $old_projects = DB::connection('old')->table('projects')->get();

        foreach ($old_projects as $old_project) {

            if ($old_project->approval_status === "approved") {
                $review_status_id = 1;
            } elseif ($old_project->approval_status === "archive") {
                $review_status_id = 2;
            } elseif ($old_project->approval_status === "in review") {
                $review_status_id = 3;
            } elseif ($old_project->approval_status === "hidden") {
                $review_status_id = 4;
            } elseif ($old_project->approval_status === "draft") {
                $review_status_id = 5;
            } elseif ($old_project->approval_status === "trash") {
                $review_status_id = 6;
            }

            if ($old_project->budget_type === "monetary") {
                $budget_type_id = 1;
            } elseif ($old_project->budget_type === "hr") {
                $budget_type_id = 2;
            }

            $new_project = Project::create([
                'review_status_id'            => $review_status_id ?? null,
                'degree_program'              => $old_project->degree_program,
                'compensation'                => $old_project->compensation_description,
                'responsibilities'            => $old_project->student_responsibilities,
                'learning_outcomes'           => $old_project->student_learning_outcomes,
                'sustainability_contribution' => $old_project->sustainability_contribution,
                'qualifications'              => $old_project->qualifications,
                'application_instructions'    => $old_project->application_instructions,
                'implementation_paths'        => $old_project->implementation_paths,
                'budget_type_id'              => $budget_type_id ?? null,
                'budget_amount'               => $old_project->budget_amount,
                'program_lead'                => $old_project->program_lead,
                'success_story'               => $old_project->project_story,
                'library_collection'          => $old_project->library_collection,
                'fav_count'                   => $old_project->fav_count,
            ]);

            if ($old_project->status === "concept") {
                $status_id = 1;
            } elseif ($old_project->status === "filled") {
                $status_id = 5;
            } elseif ($old_project->status === "completed") {
                $status_id = 7;
            } elseif ($old_project->status === "seeking-champion") {
                $status_id = 3;
            } elseif ($old_project->status === "recruiting") {
                $status_id = 4;
            } elseif ($old_project->status === "in-progress") {
                $status_id = 6;
            }

            if (substr($old_project->start_term, 1, 1) == 1) {
                $month_date = '-09-01';
            } elseif (substr($old_project->start_term, 1, 1) == 2) {
                $month_date = '-01-15';
            } elseif (substr($old_project->start_term, 1, 1) == 3) {
                $month_date = '-06-01';
            } else {
                $month_date = '-01-01';
            }
            if ($old_project->start_date > '2015-12-31') {
                $project_start = date('Y', strtotime($old_project->start_date)) . $month_date;
            } else {
                $project_start = $old_project->start_date;
            }

            if (substr($old_project->end_term, 1, 1) == 1) {
                $month_date = '-09-01';
            } elseif (substr($old_project->end_term, 1, 1) == 2) {
                $month_date = '-01-15';
            } elseif (substr($old_project->end_term, 1, 1) == 3) {
                $month_date = '-06-01';
            } else {
                $month_date = '-01-01';
            }
            if ($old_project->end_date > '2015-12-31') {
                $project_end = date('Y', strtotime($old_project->end_date)) . $month_date;
            } else {
                $project_end = $old_project->end_date;
            }

            $new_opportunity = Opportunity::create([
                'id'                    => $old_project->id,
                'opportunityable_id'    => $new_project->id,
                'opportunityable_type'  => 'Project',
                'name'                  => $old_project->title,
                'public_name'           => $old_project->alternate_title,
                // 'slug'               => $old_project->,
                'opportunity_status_id' => $status_id ?? null,
                'is_hidden'             => $old_project->hidden,
                // 'summary'            => $old_project->,
                'description'           => $old_project->project_description,
                'start_date'            => $project_start ?? null,
                'end_date'              => $project_end ?? null,
                // 'listing_starts'     => $old_project->,
                // 'listing_ends'       => $old_project->,
                'application_deadline'  => $old_project->application_deadline,
                // 'organization_id'       => $old_project->,
                // 'submitting_user_id'    => $old_project->project_submitted_by,
                'supervisor_user_id'    => $old_project->owner_user_id,
                'created_at'            => $old_project->created,
                'updated_at'            => $old_project->updated,
                'created_by'            => 1,
                'updated_by'            => 1,
            ]);

            $new_address = Address::create([
                'addressable_id'   => $old_project->id,
                'addressable_type' => 'Opportunity',
                // 'street1'          => '',
                // 'street2'          => '',
                'city'             => $old_project->location_city,
                'state'            => $old_project->location_state,
                // 'postal_code'      => $faker->postcode,
                'country'          => $old_project->location_country,
                'note'             => $old_project->location,
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'created_by'       => 1,
                'updated_by'       => 1,
            ]);

            DB::table('notes')->insert([
                'noteable_id'   => $old_project->id,
                'noteable_type' => 'Opportunity',
                'user_id'       => 1,
                'body'          => 'Project Updates: ' . $old_project->project_updates,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
                'created_by'    => 1,
                'updated_by'    => 1,
            ]);

            DB::table('notes')->insert([
                'noteable_id'   => $old_project->id,
                'noteable_type' => 'Opportunity',
                'user_id'       => 1,
                'body'          => 'Comments: ' . $old_project->comments,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
                'created_by'    => 1,
                'updated_by'    => 1,
            ]);



            // DB::table('category_opportunity')->insert([
            //     'opportunity_id' => $i + 1,
            //     'category_id' => $faker->numberBetween(1, 6),
            //     'order' => 1,
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now(),
            //     'created_by' => 1,
            //     'updated_by' => 1,
            // ]);

            // DB::table('keyword_opportunity')->insert([
            //     'opportunity_id' => $i + 1,
            //     'keyword_id' => $faker->numberBetween(1, 61),
            //     'order' => 1,
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now(),
            //     'created_by' => 1,
            //     'updated_by' => 1,
            // ]);


            // Affiliations

            // Urgent?
            if ($old_project->urgent === 1) {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_project->id,
                    'affiliation_id' => 1,
                    'order'          => 1,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // SOS?
            if ($old_project->sos_affiliation === 1) {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_project->id,
                    'affiliation_id' => 2,
                    'order'          => 2,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Undergrad?
            if ($old_project->available_for_undergraduates === 1) {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_project->id,
                    'affiliation_id' => 3,
                    'order'          => 3,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Grad?
            if ($old_project->available_for_graduates === 1) {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_project->id,
                    'affiliation_id' => 4,
                    'order'          => 4,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Class Project?
            if ($old_project->type === 'General Project') {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_project->id,
                    'affiliation_id' => 5,
                    'order'          => 4,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Class Project?
            if ($old_project->type === 'Class Project') {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_project->id,
                    'affiliation_id' => 7,
                    'order'          => 4,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Culminating Experience?
            if ($old_project->type === 'Culminating Experience') {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_project->id,
                    'affiliation_id' => 6,
                    'order'          => 4,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }
            if ($old_project->type === 'Culminating Experience') {
                DB::table('category_opportunity')->insert([
                    'opportunity_id' => $old_project->id,
                    'category_id'    => 1,
                    'order'          => 1,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Other?
            if ($old_project->type === 'Other') {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_project->id,
                    'affiliation_id' => 8,
                    'order'          => 4,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Other?
            if ($old_project->type === 'Other (G)') {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_project->id,
                    'affiliation_id' => 8,
                    'order'          => 4,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Other?
            if ($old_project->type === 'Other (U)') {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_project->id,
                    'affiliation_id' => 8,
                    'order'          => 4,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Research (Thesis/Dissertation)?
            if ($old_project->type === 'Research (Thesis/Dissertation)') {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_project->id,
                    'affiliation_id' => 9,
                    'order'          => 4,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // REU?
            if ($old_project->type === 'REU') {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_project->id,
                    'affiliation_id' => 10,
                    'order'          => 4,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Service Learning?
            if ($old_project->type === 'Service Learning') {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_project->id,
                    'affiliation_id' => 11,
                    'order'          => 4,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Workshop?
            if ($old_project->type === 'Workshop') {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_project->id,
                    'affiliation_id' => 12,
                    'order'          => 4,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }
            if ($old_project->type === 'Workshop') {
                DB::table('category_opportunity')->insert([
                    'opportunity_id' => $old_project->id,
                    'category_id'    => 6,
                    'order'          => 1,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

        }
    }
}