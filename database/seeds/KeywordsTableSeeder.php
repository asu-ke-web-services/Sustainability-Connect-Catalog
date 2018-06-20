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
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'alternative-fuels',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 3,
                'name' => 'Alternative Fuels',
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'architecture',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 4,
                'name' => 'Architecture',
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
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'citizen-actions',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 6,
                'name' => 'Citizen Actions',
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'conservation-biology',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 7,
                'name' => 'Conservation Biology',
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'desertification',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 8,
                'name' => 'Desertification',
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'ecosystem-restoration',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 9,
                'name' => 'Ecosystem Restoration',
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'energy-policy',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 10,
                'name' => 'Energy Policy',
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'entrepreneurship',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 11,
                'name' => 'Entrepreneurship',
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'farmers-markets',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 12,
                'name' => 'Farmers Markets',
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'food-systems',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 13,
                'name' => 'Food Systems',
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
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'green-marketing',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 14,
                'name' => 'Green Marketing',
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'groundwater',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 15,
                'name' => 'Groundwater',
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'land-use-change',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 16,
                'name' => 'Land Use Change',
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'poverty',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 17,
                'name' => 'Poverty',
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'recreation',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 18,
                'name' => 'Recreation',
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
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'transportation',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 21,
                'name' => 'Transportation',
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'urban-development',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 22,
                'name' => 'Urban Development',
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'wastewater-treatment',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 23,
                'name' => 'Wastewater Treatment',
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'water-resource-management',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 24,
                'name' => 'Water Resource Management',
            ])->save();
        }
    }
}
