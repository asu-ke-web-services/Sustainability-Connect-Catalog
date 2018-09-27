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
                'frontend_fa_icon'  => json_encode(array(
                        array(
                            'tag'       => 'span',
                            'className' => 'fa fa-square fa-maroon fa-stack-2x',
                            'content'   => null,
                        ),
                        array(
                            'tag'       => 'span',
                            'className' => 'fa fa-exclamation fa-stack-1x fa-inverse',
                            'content'   => null,
                        ),
                )),
                'backend_fa_icon'  => json_encode(array(
                        array(
                            'tag'       => 'span',
                            'className' => 'fa fa-exclamation',
                            'content'   => null,
                        ),
                )),
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
                'frontend_fa_icon'        => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-square fa-green fa-stack-2x',
                            'content' => null,
                        ),
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-leaf fa-stack-1x',
                            'content' => null,
                        ),
                )),
                'backend_fa_icon'  => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-leaf',
                            'content' => null,
                        ),
                )),
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-undergrad',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
                'order'          => 3,
                'access_control' => 0,
                'name'           => 'Undergrad',
                'help_text'      => 'Available for Undergraduates',
                'frontend_fa_icon'        => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-square fa-blue fa-stack-2x',
                            'content' => null,
                        ),
                        array(
                            'tag' => 'strong',
                            'className' => 'fa-stack-1x fa-inverse',
                            'content' => 'U',
                        ),
                )),
                'backend_fa_icon'  => json_encode(array(
                        array(
                            'tag' => 'strong',
                            'className' => '',
                            'content' => 'U',
                        ),
                )),
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-grad',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'opportunity_type_id' => 1,
                'order'          => 4,
                'access_control' => 0,
                'name'           => 'Grad',
                'help_text'      => 'Available for Graduate Students',
                'frontend_fa_icon'        => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-square fa-blue-darkened fa-stack-2x',
                            'content' => null,
                        ),
                        array(
                            'tag' => 'strong',
                            'className' => 'fa-stack-1x fa-inverse',
                            'content' => 'G',
                        ),
                )),
                'backend_fa_icon'  => json_encode(array(
                        array(
                            'tag' => 'strong',
                            'className' => '',
                            'content' => 'G',
                        ),
                )),
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
                'order'               => 5,
                'access_control'      => 0,
                'name'                => 'General Project',
                'help_text'           => 'General Project',
                'frontend_fa_icon'             => null,
                'backend_fa_icon'     => null,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
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
                'frontend_fa_icon'        => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-square fa-gold fa-stack-2x',
                            'content' => null,
                        ),
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-graduation-cap fa-stack-1x',
                            'content' => null,
                        ),
                )),
                'backend_fa_icon'  => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-graduation-cap',
                            'content' => null,
                        ),
                )),
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
                'order'               => 7,
                'access_control'      => 0,
                'name'                => 'Class Project',
                'help_text'           => 'Class Project',
                'frontend_fa_icon'             => null,
                'backend_fa_icon'     => null,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-other',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 1,
                'order'               => 8,
                'access_control'      => 0,
                'name'                => 'Other',
                'help_text'           => 'Other Project',
                'frontend_fa_icon'             => null,
                'backend_fa_icon'     => null,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-other-g',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 1,
                'order'               => 9,
                'access_control'      => 0,
                'name'                => 'Other (G)',
                'help_text'           => 'Other Project for Grad Students',
                'frontend_fa_icon'             => null,
                'backend_fa_icon'     => null,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-other-u',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 1,
                'order'               => 10,
                'access_control'      => 0,
                'name'                => 'Other (U)',
                'help_text'           => 'Other Project for Undergrad Students',
                'frontend_fa_icon'             => null,
                'backend_fa_icon'     => null,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-research',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 1,
                'order'               => 11,
                'access_control'      => 0,
                'name'                => 'Research',
                'help_text'           => 'Research Project',
                'frontend_fa_icon'             => null,
                'backend_fa_icon'     => null,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'project-reu',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 1,
                'order'               => 12,
                'access_control'      => 0,
                'name'                => 'REU',
                'help_text'           => 'REU',
                'frontend_fa_icon'             => null,
                'backend_fa_icon'     => null,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
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
                'frontend_fa_icon'        => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-square fa-abbey fa-stack-2x',
                            'content' => null,
                        ),
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-users fa-stack-1x fa-inverse',
                            'content' => null,
                        ),
                )),
                'backend_fa_icon'  => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-users',
                            'content' => null,
                        ),
                )),
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
                'order'               => 14,
                'access_control'      => 0,
                'name'                => 'Workshop',
                'help_text'           => 'Workshop',
                'frontend_fa_icon'             => null,
                'backend_fa_icon'     => null,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
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
                'frontend_fa_icon'        => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-square fa-maroon fa-stack-2x',
                            'content' => null,
                        ),
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-exclamation fa-stack-1x fa-inverse',
                            'content' => null,
                        ),
                )),
                'backend_fa_icon'  => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-exclamation',
                            'content' => null,
                        ),
                )),
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
                'frontend_fa_icon'        => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-square fa-green fa-stack-2x',
                            'content' => null,
                        ),
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-leaf fa-stack-1x',
                            'content' => null,
                        ),
                )),
                'backend_fa_icon'  => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-leaf',
                            'content' => null,
                        ),
                )),
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
                'order'               => 3,
                'access_control'      => 0,
                'name'                => 'Open to All Majors',
                'help_text'           => '',
                'frontend_fa_icon'    => null,
                'backend_fa_icon'     => null,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'internship-credit-pending-approval',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
                'opportunity_type_id' => 2,
                'order'               => 4,
                'access_control'      => 0,
                'name'                => 'Credit',
                'help_text'           => 'Earning college credit for this internship is subject to prior approval',
                'frontend_fa_icon'        => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-square fa-gold fa-stack-2x',
                            'content' => null,
                        ),
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-graduation-cap fa-stack-1x',
                            'content' => null,
                        ),
                )),
                'backend_fa_icon'  => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-graduation-cap',
                            'content' => null,
                        ),
                )),
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
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
                'help_text'      => 'Available in the Fall semester',
                'frontend_fa_icon'        => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className'   => 'fa fa-square fa-blue fa-stack-2x',
                            'content'    => null,
                        ),
                        array(
                            'tag' => 'strong',
                            'className'   => '',
                            'content'    => 'F',
                        ),
                )),
                'backend_fa_icon' => json_encode(array(
                        array(
                            'tag' => 'strong',
                            'className'   => '',
                            'content'    => 'F',
                        ),
                )),
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
                'help_text'      => 'Available in the Spring semester',
                'frontend_fa_icon'        => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-square fa-blue fa-stack-2x',
                            'content' => null,
                        ),
                        array(
                            'tag' => 'strong',
                            'className' => '',
                            'content' => 'S',
                        ),
                )),
                'backend_fa_icon'  => json_encode(array(
                        array(
                            'tag' => 'strong',
                            'className' => '',
                            'content' => 'Sp',
                        ),
                )),
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
                'help_text'      => 'Available during Summer Break',
                'frontend_fa_icon'        => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-square fa-blue fa-stack-2x',
                            'content' => null,
                        ),
                        array(
                            'tag' => 'strong',
                            'className' => '',
                            'content' => 'B',
                        ),
                )),
                'backend_fa_icon'  => json_encode(array(
                        array(
                            'tag' => 'strong',
                            'className' => '',
                            'content' => 'Sum',
                        ),
                )),
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
                'frontend_fa_icon'        => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-square fa-green fa-stack-2x',
                            'content' => null,
                        ),
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-usd fa-stack-1x',
                            'content' => null,
                        ),
                )),
                'backend_fa_icon'  => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-dollar-sign',
                            'content' => null,
                        ),
                )),
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
                'frontend_fa_icon'        => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-square fa-blue fa-stack-2x',
                            'content' => null,
                        ),
                        array(
                            'tag' => 'strong',
                            'className' => 'fa-stack-1x fa-inverse',
                            'content' => 'U',
                        ),
                )),
                'backend_fa_icon'  => json_encode(array(
                        array(
                            'tag' => 'strong',
                            'className' => '',
                            'content' => 'U',
                        ),
                )),
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
                'frontend_fa_icon'        => json_encode(array(
                        array(
                            'tag' => 'span',
                            'className' => 'fa fa-square fa-blue-darkened fa-stack-2x',
                            'content' => null,
                        ),
                        array(
                            'tag' => 'strong',
                            'className' => 'fa-stack-1x fa-inverse',
                            'content' => 'G',
                        ),
                )),
                'backend_fa_icon'  => json_encode(array(
                        array(
                            'tag' => 'strong',
                            'className' => '',
                            'content' => 'G',
                        ),
                )),
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'created_by'     => 1,
                'updated_by'     => 1,
            ])->save();
        }

    }
}
