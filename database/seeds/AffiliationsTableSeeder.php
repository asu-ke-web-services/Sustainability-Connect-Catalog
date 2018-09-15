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
                'order'          => 1,
                'access_control' => 0,
                'name'           => 'Urgent',
                'help_text'      => 'This project urgently needs participants!',
                'fa_icon'        => '<i class="fa fa-exclamation"></i>',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-sos-majors-only',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
                'order'          => 2,
                'access_control' => 1,
                'name'           => 'SOS Majors Only',
                'help_text'      => 'Restricted to students majoring in degrees from The School of Sustainability',
                'fa_icon'        => '<i class="fa fa-leaf"></i>',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-available-undergraduate',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
                'order'          => 3,
                'access_control' => 0,
                'name'           => 'Available for Undergraduates',
                'help_text'      => '',
                'fa_icon'        => '<strong>U</strong>',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-available-graduate',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
                'order'          => 4,
                'access_control' => 0,
                'name'           => 'Available for Graduate Students',
                'help_text'      => '',
                'fa_icon'        => '<strong>G</strong>',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-general-project',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
                'order'          => 5,
                'access_control' => 0,
                'name'           => 'General Project',
                'help_text'      => '',
                'fa_icon'        => '',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-culminating-experience',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
                'order'          => 6,
                'access_control' => 0,
                'name'           => 'Culminating Experience',
                'help_text'      => 'Can fulfill School of Sustainability Culminating Experience',
                'fa_icon'        => '<i class="fa fa-graduation-cap"></i>',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-class-project',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
                'order'          => 7,
                'access_control' => 0,
                'name'           => 'Class Project',
                'help_text'      => '',
                'fa_icon'        => '',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-other',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
                'order'          => 8,
                'access_control' => 0,
                'name'           => 'Other',
                'help_text'      => '',
                'fa_icon'        => '',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-other-g',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 1,
                'order'          => 9,
                'access_control' => 0,
                'name'           => 'Other (G)',
                'help_text'      => '',
                'fa_icon'        => '',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-other-u',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 1,
                'order'          => 10,
                'access_control' => 0,
                'name'           => 'Other (U)',
                'help_text'      => '',
                'fa_icon'        => '',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-research-thesis-dissertation',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
                'order'          => 11,
                'access_control' => 0,
                'name'           => 'Research (Thesis/Dissertation)',
                'help_text'      => '',
                'fa_icon'        => '',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-reu',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
                'order'          => 12,
                'access_control' => 0,
                'name'           => 'REU',
                'help_text'      => '',
                'fa_icon'        => '',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-service-learning',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
                'order'          => 13,
                'access_control' => 0,
                'name'           => 'Service Learning',
                'help_text'      => 'A Service Learning opportunity',
                'fa_icon'        => '<i class="fa fa-users"></i>',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-workshop',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
                'order'          => 14,
                'access_control' => 0,
                'name'           => 'Workshop',
                'help_text'      => '',
                'fa_icon'        => '',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }


        // Internship Affiliations

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-urgent',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 2,
                'order'          => 1,
                'access_control' => 0,
                'name'           => 'Urgent',
                'help_text'      => 'This internship urgently needs participants!',
                'fa_icon'        => '<i class="fa fa-exclamation"></i>',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-sos-majors-only',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 2,
                'order'          => 2,
                'access_control' => 1,
                'name'           => 'SOS Majors Only',
                'help_text'      => 'Restricted to students majoring in degrees from the School of Sustainability',
                'fa_icon'        => '<i class="fa fa-leaf"></i>',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-open-all-majors',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 2,
                'order'          => 3,
                'access_control' => 0,
                'name'           => 'Open to All Majors',
                'help_text'      => '',
                'fa_icon'        => '',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-credit-pending-approval',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 2,
                'order'          => 4,
                'access_control' => 0,
                'name'           => 'Credit',
                'help_text'      => 'Earning college credit for this internship is subject to prior approval',
                'fa_icon'        => '',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-available-fall',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 2,
                'order'          => 5,
                'access_control' => 0,
                'name'           => 'Fall',
                'help_text'      => 'Available for Fall',
                'fa_icon'        => '<strong>F</strong>',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-available-spring',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 2,
                'order'          => 6,
                'access_control' => 0,
                'name'           => 'Spring',
                'help_text'      => 'Available for Spring',
                'fa_icon'        => '<strong>Sp</strong>',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-available-summer',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 2,
                'order'          => 7,
                'access_control' => 0,
                'name'           => 'Summer',
                'help_text'      => 'Available for Summer',
                'fa_icon'        => '<strong>Sum</strong>',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-paid',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 2,
                'order'          => 8,
                'access_control' => 0,
                'name'           => 'Paid',
                'help_text'      => 'Paid internship',
                'fa_icon'        => '<i class="fa fa-dollar-sign"></i>',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-available-undergraduates',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 2,
                'order'          => 9,
                'access_control' => 0,
                'name'           => 'Undergrad',
                'help_text'      => 'Available for Undergraduates',
                'fa_icon'        => '<strong>U</strong>',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-available-grad-students',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 2,
                'order'          => 10,
                'access_control' => 0,
                'name'           => 'Grad',
                'help_text'      => 'Available for Grad Students',
                'fa_icon'        => '<strong>G</strong>',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

    }
}
