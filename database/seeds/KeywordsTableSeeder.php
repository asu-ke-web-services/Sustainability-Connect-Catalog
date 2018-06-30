<?php

use Illuminate\Database\Seeder;
use App\Models\Keyword;

class KeywordsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {

        $keyword = Keyword::firstOrNew([
            'slug' => 'air-quality',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 2,
                'name' => 'Air Quality',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'alternative-fuels',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 3,
                'name' => 'Alternative Fuels',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'architecture',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 4,
                'name' => 'Architecture',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'biofuels',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 5,
            	'parent_id' => 3,
                'name' => 'Biofuels',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'citizen-actions',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 6,
                'name' => 'Citizen Actions',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'conservation-biology',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 7,
                'name' => 'Conservation Biology',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'desertification',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 8,
                'name' => 'Desertification',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'ecosystem-restoration',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 9,
                'name' => 'Ecosystem Restoration',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'energy-policy',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 10,
                'name' => 'Energy Policy',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'entrepreneurship',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 11,
                'name' => 'Entrepreneurship',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'farmers-markets',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 12,
                'name' => 'Farmers Markets',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'food-systems',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 13,
                'name' => 'Food Systems',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'agriculture',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 1,
            	'parent_id' => 13,
                'name' => 'Agriculture',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'green-marketing',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 14,
                'name' => 'Green Marketing',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'groundwater',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 15,
                'name' => 'Groundwater',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'land-use-change',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 16,
                'name' => 'Land Use Change',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'poverty',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 17,
                'name' => 'Poverty',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'recreation',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 18,
                'name' => 'Recreation',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'renewable-energy',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 19,
            	'parent_id' => 10,
                'name' => 'Renewable Energy',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'solar-energy-systems',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 20,
            	'parent_id' => 19,
                'name' => 'Solar Energy Systems',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'transportation',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 21,
                'name' => 'Transportation',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'urban-development',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 22,
                'name' => 'Urban Development',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'wastewater-treatment',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 23,
                'name' => 'Wastewater Treatment',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'water-resource-management',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 24,
                'name' => 'Water Resource Management',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }
    }
}
