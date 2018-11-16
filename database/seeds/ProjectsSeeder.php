<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Address\Address;
use SCCatalog\Models\Note\Note;
use SCCatalog\Models\Opportunity\Project;

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

        Project::withoutSyncingToSearch(function () {

            $old_projects = DB::connection('old')->table('projects')->get();

            foreach ($old_projects as $old_project) {

                $status_id = 2; // Archived fallback

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

                $deleted_at = null;

                if ($old_project->approval_status === "approved") {
                    $review_status_id = 3;
                } elseif ($old_project->approval_status === "archive") {
                    $review_status_id = 4;
                    $status_id = 2;
                } elseif ($old_project->approval_status === "in review") {
                    $review_status_id = 2;
                } elseif ($old_project->approval_status === "hidden") {
                    $review_status_id = 4;
                    $status_id = 2;
                    $deleted_at = Carbon::now()->timestamp;
                } elseif ($old_project->approval_status === "trash") {
                    $review_status_id = 4;
                    $status_id = 2;
                    $deleted_at = Carbon::now()->timestamp;
                }

                if ($old_project->hidden === 1) {
                    $deleted_at = Carbon::now()->timestamp;
                }


                if ($old_project->budget_type === "monetary") {
                    $budget_type_id = 1;
                } elseif ($old_project->budget_type === "hr") {
                    $budget_type_id = 2;
                }

                if (substr($old_project->start_term, 1, 1) == 1) {
                    $month = 9;
                    $day = 1;
                } elseif (substr($old_project->start_term, 1, 1) == 2) {
                    $month = 1;
                    $day = 15;
                } elseif (substr($old_project->start_term, 1, 1) == 3) {
                    $month = 6;
                    $day = 1;
                } else {
                    $month = 1;
                    $day = 1;
                }

                if (is_null($old_project->start_date)) {
                    $project_start =  null;
                } elseif ($old_project->start_date > '2015-12-31') {
                    $project_start = Carbon::createFromDate(date('Y', strtotime($old_project->start_date)), $month, $day)->timestamp;
                } else {
                    $project_start = Carbon::parse($old_project->start_date)->timestamp;
                }


                if (substr($old_project->end_date, 1, 1) == 1) {
                    $month = 9;
                    $day = 1;
                } elseif (substr($old_project->end_date, 1, 1) == 2) {
                    $month = 1;
                    $day = 15;
                } elseif (substr($old_project->end_date, 1, 1) == 3) {
                    $month = 6;
                    $day = 1;
                } else {
                    $month = 1;
                    $day = 1;
                }

                if (is_null($old_project->end_date)) {
                    $project_end =  null;
                } elseif ($old_project->end_date > '2015-12-31') {
                    $project_end = Carbon::createFromDate(date('Y', strtotime($old_project->end_date)), $month, $day)->timestamp;
                } else {
                    $project_end = Carbon::parse($old_project->end_date)->timestamp;
                }

                if (is_null($old_project->application_deadline)) {
                    $app_deadline =  null;
                } else {
                    $app_deadline = Carbon::parse($old_project->application_deadline)->timestamp;
                }


                $new_project = Project::create([
                    'id'                          => $old_project->id,
                    'needs_review'                => 1,
                    'name'                        => $old_project->title,
                    'opportunity_status_id'       => $status_id,
                    'review_status_id'            => $review_status_id,
                    'description'                 => $old_project->project_description,
                    'opportunity_start_at'        => $project_start,
                    'opportunity_end_at'          => $project_end,
                    // 'listing_start_at'         => $old_project->,
                    // 'listing_end_at'           => $old_project->,
                    'application_deadline_at'     => $app_deadline,
                    // 'organization_id'          => $old_project->,
                    // 'submitting_user_id'       => $old_project->project_submitted_by,
                    'supervisor_user_id'          => $old_project->owner_user_id,
                    'follower_count'              => $old_project->fav_count,
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
                    'created_at'                  => Carbon::parse($old_project->created)->timestamp,
                    'updated_at'                  => Carbon::parse($old_project->updated)->timestamp,
                    'created_by'                  => 1,
                    'updated_by'                  => 1,
                    'deleted_at'                  => $deleted_at ?? null,
                    'deleted_by'                  => $deleted_at !== null ? 1 : null,
                ]);


                $newAddress = Address::create([
                    'addressable_id' => $new_project->id,
                    'addressable_type' => 'Project',
                    // 'street1'     => '',
                    // 'street2'     => '',
                    'city'           => $old_project->location_city,
                    'state'          => $old_project->location_state,
                    // 'postal_code' => $faker->postcode,
                    'country'        => $old_project->location_country,
                    'comment'        => $old_project->location,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);

                if ($old_project->project_updates > ' ') {
                    $newNote = Note::create([
                        'notable_id'   => $new_project->id,
                        'notable_type' => 'Project',
                        'user_id'      => 1,
                        'body'         => 'Project Updates: ' . $old_project->project_updates,
                        'created_at'   => Carbon::now(),
                        'updated_at'   => Carbon::now(),
                        'created_by'   => 1,
                        'updated_by'   => 1,
                    ]);
                }

                if ($old_project->comments > ' ') {
                    $newNote = Note::create([
                        'notable_id'   => $new_project->id,
                        'notable_type' => 'Project',
                        'user_id'      => 1,
                        'body'         => 'Comments: ' . $old_project->comments,
                        'created_at'   => Carbon::now(),
                        'updated_at'   => Carbon::now(),
                        'created_by'   => 1,
                        'updated_by'   => 1,
                    ]);
                }


                // Affiliations

                // Urgent?
                if ($old_project->urgent === 1) {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 1,
                        'affiliationable_id'   => $new_project->id,
                        'affiliationable_type' => 'Project',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // SOS?
                if ($old_project->sos_affiliation === 1) {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 2,
                        'affiliationable_id'   => $new_project->id,
                        'affiliationable_type' => 'Project',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Undergrad?
                if ($old_project->available_for_undergraduates === 1) {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 3,
                        'affiliationable_id'   => $new_project->id,
                        'affiliationable_type' => 'Project',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Grad?
                if ($old_project->available_for_graduates === 1) {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 4,
                        'affiliationable_id'   => $new_project->id,
                        'affiliationable_type' => 'Project',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Class Project?
                if ($old_project->type === 'General Project') {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 5,
                        'affiliationable_id'   => $new_project->id,
                        'affiliationable_type' => 'Project',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Class Project?
                if ($old_project->type === 'Class Project') {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 7,
                        'affiliationable_id'   => $new_project->id,
                        'affiliationable_type' => 'Project',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Culminating Experience?
                if ($old_project->type === 'Culminating Experience') {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 6,
                        'affiliationable_id'   => $new_project->id,
                        'affiliationable_type' => 'Project',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }
                if ($old_project->type === 'Culminating Experience') {
                    DB::table('categorisables')->insert([
                        'category_id'        => 1,
                        'categorisable_id'   => $new_project->id,
                        'categorisable_type' => 'Project',
                        'created_at'         => Carbon::now(),
                        'updated_at'         => Carbon::now(),
                        'created_by'         => 1,
                        'updated_by'         => 1,
                    ]);
                }

                // Other?
                if ($old_project->type === 'Other') {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 8,
                        'affiliationable_id'   => $new_project->id,
                        'affiliationable_type' => 'Project',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Other?
                if ($old_project->type === 'Other (G)') {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 9,
                        'affiliationable_id'   => $new_project->id,
                        'affiliationable_type' => 'Project',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Other?
                if ($old_project->type === 'Other (U)') {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 10,
                        'affiliationable_id'   => $new_project->id,
                        'affiliationable_type' => 'Project',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Research (Thesis/Dissertation)?
                if ($old_project->type === 'Research (Thesis/Dissertation)') {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 11,
                        'affiliationable_id'   => $new_project->id,
                        'affiliationable_type' => 'Project',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // REU?
                if ($old_project->type === 'REU') {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 12,
                        'affiliationable_id'   => $new_project->id,
                        'affiliationable_type' => 'Project',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Service Learning?
                if ($old_project->type === 'Service Learning') {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 13,
                        'affiliationable_id'   => $new_project->id,
                        'affiliationable_type' => 'Project',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Workshop?
                if ($old_project->type === 'Workshop') {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 14,
                        'affiliationable_id'   => $new_project->id,
                        'affiliationable_type' => 'Project',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }
                if ($old_project->type === 'Workshop') {
                    DB::table('categorisables')->insert([
                        'category_id'        => 6,
                        'categorisable_id'   => $new_project->id,
                        'categorisable_type' => 'Project',
                        'created_at'         => Carbon::now(),
                        'updated_at'         => Carbon::now(),
                        'created_by'         => 1,
                        'updated_by'         => 1,
                    ]);
                }
            }
        });

    }
}
