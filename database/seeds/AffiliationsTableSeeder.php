<?php

use Illuminate\Database\Seeder;
use SCCatalog\Models\Affiliation;

class AffiliationsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('affiliations')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create();

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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }
    }
}
