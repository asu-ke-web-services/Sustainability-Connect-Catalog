<?php

use Illuminate\Database\Seeder;
use App\Models\Affiliation;

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
            'slug' => 'urgent',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 1,
            	'order' => 1,
                'access_control' => 0,
                'name' => 'Urgent',
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'sos-majors-only',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 1,
            	'order' => 2,
                'access_control' => 1,
                'name' => 'SOS Majors Only',
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'available-undergraduate',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 1,
            	'order' => 3,
                'access_control' => 0,
                'name' => 'Available for Undergraduates',
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'available-graduate',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 1,
            	'order' => 4,
                'access_control' => 0,
                'name' => 'Available for Graduate Students',
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'general-project',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 1,
            	'order' => 5,
                'access_control' => 0,
                'name' => 'General Project',
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'culminating-experience',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 1,
            	'order' => 6,
                'access_control' => 0,
                'name' => 'Culminating Experience',
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'class-project',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 1,
            	'order' => 7,
                'access_control' => 0,
                'name' => 'Class Project',
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'other',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 1,
            	'order' => 8,
                'access_control' => 0,
                'name' => 'Other',
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'research-thesis-dissertation',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 1,
            	'order' => 9,
                'access_control' => 0,
                'name' => 'Research (Thesis/Dissertation)',
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'reu',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 1,
            	'order' => 10,
                'access_control' => 0,
                'name' => 'REU',
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'service-learning',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 1,
            	'order' => 11,
                'access_control' => 0,
                'name' => 'Service Learning',
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'workshop',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 1,
            	'order' => 12,
                'access_control' => 0,
                'name' => 'Workshop',
            ])->save();
        }


        // Internship Affiliations

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'urgent',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 2,
            	'order' => 1,
                'access_control' => 0,
                'name' => 'Urgent',
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'sos-majors-only',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 2,
            	'order' => 2,
                'access_control' => 1,
                'name' => 'SOS Majors Only',
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'available-fall',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 2,
            	'order' => 3,
                'access_control' => 0,
                'name' => 'Available for Fall',
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'available-spring',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 2,
            	'order' => 4,
                'access_control' => 0,
                'name' => 'Available for Spring',
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'available-summer',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 2,
            	'order' => 5,
                'access_control' => 0,
                'name' => 'Available for Summer',
            ])->save();
        }

        $affiliation = Affiliation::firstOrNew([
            'slug' => 'paid',
        ]);
        if (!$affiliation->exists) {
            $affiliation->fill([
            	'parent_id' => null,
            	'opportunity_type_id' => 2,
            	'order' => 6,
                'access_control' => 0,
                'name' => 'Paid Internship',
            ])->save();
        }
    }
}
