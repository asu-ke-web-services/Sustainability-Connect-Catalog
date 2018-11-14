<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Address\Address;
use SCCatalog\Models\Note\Note;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Models\Opportunity\Opportunity;

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

        Internship::withoutSyncingToSearch(function () {

            $old_internships = DB::connection('old')->table('internships')->get();

            foreach ($old_internships as $old_internship) {

                if ($old_internship->status === "inactive") {
                    $status_id = 8;
                } elseif ($old_internship->status === "active") {
                    $status_id = 9;
                }

                if (is_null($old_internship->publish_on)) {
                    $listing_start_at =  null;
                } else {
                    $listing_start_at = Carbon::parse($old_internship->publish_on)->toDateString();
                }

                if (is_null($old_internship->published_until)) {
                    $listing_end_at =  null;
                } else {
                    $listing_end_at = Carbon::parse($old_internship->published_until)->toDateString();
                }

                $new_internship = Internship::create([
                    'id'                       => $old_internship->id,
                    'needs_review'             => 1,
                    'name'                     => $old_internship->title,
                    'opportunity_status_id'    => $status_id ?? null,
                    'description'              => $old_internship->internship_description,
                    // 'opportunity_start_at'     => $project_start,
                    // 'opportunity_end_at'       => $project_end,
                    'listing_start_at'         => $listing_start_at,
                    'listing_end_at'           => $listing_end_at,
                    'application_deadline_at'  => $listing_end_at,
                    // 'organization_id'       => $old_internship->,
                    // 'submitting_user_id'    => $old_internship->project_submitted_by,
                    'supervisor_user_id'       => $old_internship->owner_user_id,
                    'follower_count'           => $old_internship->fav_count,
                    'degree_program'           => $old_internship->degree_program,
                    'compensation'             => $old_internship->compensation,
                    'responsibilities'         => $old_internship->student_responsibilities,
                    'qualifications'           => $old_internship->qualifications,
                    'application_instructions' => $old_internship->application_instructions,
                    // 'program_lead'          => $old_internship->program_lead,
                    'success_story'            => $old_internship->internship_story,
                    // 'library_collection'    => $old_internship->library_collection,
                    'created_at'               => $old_internship->created,
                    'updated_at'               => $old_internship->updated,
                    'created_by'               => 1,
                    'updated_by'               => 1,
                ]);

                $newAddress = Address::create([
                    'addressable_id' => $new_internship->id,
                    'addressable_type' => 'Internship',
                    // 'street1'     => '',
                    // 'street2'     => '',
                    'city'           => $old_internship->location_city,
                    'state'          => $old_internship->location_state,
                    // 'postal_code' => $faker->postcode,
                    'country'        => $old_internship->location_country,
                    'comment'        => $old_internship->location,
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now(),
                    'created_by'     => 1,
                    'updated_by'     => 1,
                ]);


                if ($old_internship->comments > ' ') {
                    $newNote = Note::create([
                        'notable_id'   => $new_internship->id,
                        'notable_type' => 'Internship',
                        'user_id'      => 1,
                        'body'         => 'Comments: ' . $old_internship->comments,
                        'created_at'   => Carbon::now(),
                        'updated_at'   => Carbon::now(),
                        'created_by'   => 1,
                        'updated_by'   => 1,
                    ]);
                }


                // Affiliations

                // Urgent?
                if ($old_internship->urgent === 1) {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 1,
                        'affiliationable_id'   => $new_internship->id,
                        'affiliationable_type' => 'Internship',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // SOS?
                if ($old_internship->affiliation === 'Sustainability Majors Only') {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 2,
                        'affiliationable_id'   => $new_internship->id,
                        'affiliationable_type' => 'Internship',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Credit Pending Approval?
                if ($old_internship->affiliation === 'Credit Pending Approval') {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 15,
                        'affiliationable_id'   => $new_internship->id,
                        'affiliationable_type' => 'Internship',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Available in Fall?
                if ($old_internship->fall === 1) {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 16,
                        'affiliationable_id'   => $new_internship->id,
                        'affiliationable_type' => 'Internship',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Available in Spring?
                if ($old_internship->spring === 1) {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 17,
                        'affiliationable_id'   => $new_internship->id,
                        'affiliationable_type' => 'Internship',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Available in Summer?
                if ($old_internship->summer === 1) {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 18,
                        'affiliationable_id'   => $new_internship->id,
                        'affiliationable_type' => 'Internship',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Paid?
                if ($old_internship->paid === 1) {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 19,
                        'affiliationable_id'   => $new_internship->id,
                        'affiliationable_type' => 'Internship',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Undergrad?
                if ($old_internship->available_for_undergraduates === 1) {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 3,
                        'affiliationable_id'   => $new_internship->id,
                        'affiliationable_type' => 'Internship',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

                // Grad?
                if ($old_internship->available_for_graduates === 1) {
                    DB::table('affiliationables')->insert([
                        'affiliation_id'       => 4,
                        'affiliationable_id'   => $new_internship->id,
                        'affiliationable_type' => 'Internship',
                        'created_at'           => Carbon::now(),
                        'updated_at'           => Carbon::now(),
                        'created_by'           => 1,
                        'updated_by'           => 1,
                    ]);
                }

            }

        });
    }
}
