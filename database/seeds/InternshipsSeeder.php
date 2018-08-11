<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Address;
use SCCatalog\Models\Internship;
use SCCatalog\Models\Opportunity;
use SCCatalog\Models\OpportunityStatus;
use SCCatalog\Models\OpportunityType;

class InternshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Import old Internships data

        $old_internships = DB::connection('old')->table('internships')->get();

        foreach ($old_internships as $old_internship) {

            $new_internship = Internship::create([
                'degree_program'           => $old_internship->degree_program,
                'compensation'             => $old_internship->compensation,
                'responsibilities'         => $old_internship->student_responsibilities,
                'qualifications'           => $old_internship->qualifications,
                'application_instructions' => $old_internship->application_instructions,
                // 'program_lead'             => $old_internship->program_lead,
                'success_story'            => $old_internship->internship_story,
                // 'library_collection'       => $old_internship->library_collection,
                'fav_count'                => $old_internship->fav_count,
                // 'created_at'               => $old_internship->created,
                // 'updated_at'               => $old_internship->updated,
                // 'created_by'               => 1,
                // 'updated_by'               => 1,
            ]);



            if ($old_internship->status === "inactive") {
                $status_id = 1;
            } elseif ($old_internship->status === "active") {
                $status_id = 2;
            }


            // if (substr($old_project->start_term, 1, 1) == 1) {
            //     $month_date = '-09-01';
            // } elseif (substr($old_project->start_term, 1, 1) == 2) {
            //     $month_date = '-01-15';
            // } elseif (substr($old_project->start_term, 1, 1) == 3) {
            //     $month_date = '-06-01';
            // } else {
            //     $month_date = '-01-01';
            // }
            // if ($old_project->start_date > '2015-12-31') {
            //     $project_start = date('Y', strtotime($old_project->start_date)) . $month_date;
            // } else {
            //     $project_start = $old_project->start_date;
            // }

            // if (substr($old_project->end_term, 1, 1) == 1) {
            //     $month_date = '-09-01';
            // } elseif (substr($old_project->end_term, 1, 1) == 2) {
            //     $month_date = '-01-15';
            // } elseif (substr($old_project->end_term, 1, 1) == 3) {
            //     $month_date = '-06-01';
            // } else {
            //     $month_date = '-01-01';
            // }
            // if ($old_project->end_date > '2015-12-31') {
            //     $project_end = date('Y', strtotime($old_project->end_date)) . $month_date;
            // } else {
            //     $project_end = $old_project->end_date;
            // }

            $new_opportunity = Opportunity::create([
                'id'                    => $old_internship->id + 450,
                'opportunityable_id'    => $new_internship->id,
                'opportunityable_type'  => 'Internship',
                'name'                  => $old_internship->title,
                // 'public_name'           => $old_internship->alternate_title,
                // 'slug'                  => $old_internship->,
                'opportunity_status_id' => $status_id ?? null,
                'is_hidden'             => 0,
                // 'summary'               => $old_internship->,
                'description'           => $old_internship->internship_description,
                // 'start_date'            => $project_start,
                // 'end_date'              => $project_end,
                'listing_starts'        => $old_internship->publish_on,
                'listing_ends'          => $old_internship->published_until,
                // 'application_deadline'  => $old_internship->application_deadline,
                // 'organization_id'       => $old_internship->,
                // 'submitting_user_id'    => $old_internship->project_submitted_by,
                'supervisor_user_id'    => $old_internship->owner_user_id,
                'created_at'            => $old_internship->created,
                'updated_at'            => $old_internship->updated,
                'created_by'            => 1,
                'updated_by'            => 1,
            ]);

            $new_address = Address::create([
                'addressable_id'   => $old_internship->id + 450,
                'addressable_type' => 'Opportunity',
                // 'street1'          => '',
                // 'street2'          => '',
                'city'             => $old_internship->location_city,
                'state'            => $old_internship->location_state,
                // 'postal_code'      => $faker->postcode,
                'country'          => $old_internship->location_country,
                'note'             => $old_internship->location,
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'created_by'       => 1,
                'updated_by'       => 1,
            ]);

            DB::table('notes')->insert([
                'noteable_id'   => $old_internship->id + 450,
                'noteable_type' => 'Opportunity',
                'user_id'       => 1,
                'body'          => 'Comments: ' . $old_internship->comments,
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
            if ($old_internship->urgent === 1) {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_internship->id + 450,
                    'affiliation_id' => 15,
                    'order'          => 1,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // SOS?
            if ($old_internship->affiliation === 'Sustainability Majors Only') {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_internship->id + 450,
                    'affiliation_id' => 16,
                    'order'          => 2,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // All Majors?
            if ($old_internship->affiliation === 'Open to all Majors') {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_internship->id + 450,
                    'affiliation_id' => 17,
                    'order'          => 3,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Credit Pending Approval?
            if ($old_internship->affiliation === 'Credit Pending Approval') {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_internship->id + 450,
                    'affiliation_id' => 18,
                    'order'          => 4,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Available in Fall?
            if ($old_internship->fall === 1) {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_internship->id + 450,
                    'affiliation_id' => 19,
                    'order'          => 5,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Available in Spring?
            if ($old_internship->spring === 1) {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_internship->id + 450,
                    'affiliation_id' => 20,
                    'order'          => 6,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Available in Summer?
            if ($old_internship->summer === 1) {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_internship->id + 450,
                    'affiliation_id' => 21,
                    'order'          => 7,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Paid?
            if ($old_internship->paid === 1) {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_internship->id + 450,
                    'affiliation_id' => 22,
                    'order'          => 8,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Undergrad?
            if ($old_internship->available_for_undergraduates === 1) {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_internship->id + 450,
                    'affiliation_id' => 3,
                    'order'          => 3,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

            // Grad?
            if ($old_internship->available_for_graduates === 1) {
                DB::table('affiliation_opportunity')->insert([
                    'opportunity_id' => $old_internship->id + 450,
                    'affiliation_id' => 4,
                    'order'          => 4,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);
            }

        }
    }
}