<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Lookup\Affiliation;

class AffiliationsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        // Project Affiliations

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-urgent',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
            	'order' => 1,
                'access_control' => 0,
                'name' => 'Urgent',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-sos-majors-only',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
            	'order' => 2,
                'access_control' => 1,
                'name' => 'SOS Majors Only',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-available-undergraduate',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
            	'order' => 3,
                'access_control' => 0,
                'name' => 'Available for Undergraduates',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-available-graduate',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
            	'order' => 4,
                'access_control' => 0,
                'name' => 'Available for Graduate Students',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-general-project',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
            	'order' => 5,
                'access_control' => 0,
                'name' => 'General Project',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-culminating-experience',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
            	'order' => 6,
                'access_control' => 0,
                'name' => 'Culminating Experience',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-class-project',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
            	'order' => 7,
                'access_control' => 0,
                'name' => 'Class Project',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-other',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
            	'order' => 8,
                'access_control' => 0,
                'name' => 'Other',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-other-g',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 1,
                'order' => 9,
                'access_control' => 0,
                'name' => 'Other (G)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-other-u',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 1,
                'order' => 10,
                'access_control' => 0,
                'name' => 'Other (U)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-research-thesis-dissertation',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
            	'order' => 11,
                'access_control' => 0,
                'name' => 'Research (Thesis/Dissertation)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-reu',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
            	'order' => 12,
                'access_control' => 0,
                'name' => 'REU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-service-learning',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
            	'order' => 13,
                'access_control' => 0,
                'name' => 'Service Learning',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-workshop',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
            	'order' => 14,
                'access_control' => 0,
                'name' => 'Workshop',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }


        // Internship Affiliations

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-urgent',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 2,
                'order' => 1,
                'access_control' => 0,
                'name' => 'Urgent',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-sos-majors-only',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 2,
            	'order' => 2,
                'access_control' => 1,
                'name' => 'SOS Majors Only',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-open-all-majors',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 2,
                'order' => 3,
                'access_control' => 1,
                'name' => 'Open to All Majors',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-credit-pending-approval',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 2,
                'order' => 4,
                'access_control' => 1,
                'name' => 'Credit Pending Approval',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-available-fall',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 2,
            	'order' => 5,
                'access_control' => 0,
                'name' => 'Available for Fall',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-available-spring',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 2,
            	'order' => 6,
                'access_control' => 0,
                'name' => 'Available for Spring',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-available-summer',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 2,
            	'order' => 7,
                'access_control' => 0,
                'name' => 'Available for Summer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-paid',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 2,
            	'order' => 8,
                'access_control' => 0,
                'name' => 'Paid Internship',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-available-undergraduates',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 2,
                'order' => 9,
                'access_control' => 0,
                'name' => 'Available for Undergraduates',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-available-grad-students',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 2,
                'order' => 10,
                'access_control' => 0,
                'name' => 'Available for Grad Students',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

    }
}
