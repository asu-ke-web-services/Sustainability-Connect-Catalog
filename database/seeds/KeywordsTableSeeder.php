<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Keyword;

class KeywordsTableSeeder extends Seeder
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
        DB::table('keywords')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $keyword = Keyword::firstOrNew([
            'slug' => 'air-quality',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 2,
                'name' => 'Air Quality',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'alternative-fuels',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 3,
                'name' => 'Alternative Fuels',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'architecture',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 4,
                'name' => 'Architecture',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'biodiversity',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 5,
                'name' => 'Biodiversity',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'biofuels',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 6,
            	'parent_id' => 3,
                'name' => 'Biofuels',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'biogeochemical-processes',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 7,
                'name' => 'Biogeochemical Processes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'building-technology',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 8,
                'name' => 'Building Technology',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'citizen-actions',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 9,
                'name' => 'Citizen Actions',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'community-development',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 10,
                'name' => 'Community Development',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'conservation-biology',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 11,
                'name' => 'Conservation Biology',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'culture',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 12,
                'name' => 'Culture',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'decision-making',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 13,
                'name' => 'Decision Making',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'deforestation',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 14,
                'name' => 'Deforestation',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'desertification',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 15,
                'name' => 'Desertification',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'design',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 16,
                'name' => 'Design',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'ecological-systems',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 17,
                'name' => 'Ecological Systems',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'economics',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 18,
                'name' => 'Economics',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'economic-development',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 19,
                'name' => 'Economic Development',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'ecosystems',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 20,
                'name' => 'Ecosystems',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'ecosystem-restoration',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 21,
                'name' => 'Ecosystem Restoration',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'ecosystem-services',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 22,
                'name' => 'Ecosystem Services',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'education',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 23,
                'name' => 'Education',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'energy',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 24,
                'name' => 'Energy',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'energy-policy',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 25,
                'name' => 'Energy Policy',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'entrepreneurship',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 26,
                'name' => 'Entrepreneurship',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'environmental-humanities',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 27,
                'name' => 'Environmental Humanities',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'farmers-markets',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 28,
                'name' => 'Farmers Markets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'food-energy-water-nexus',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 29,
                'name' => 'Food-Energy-Water Nexus',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'food-policy',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 30,
                'name' => 'Food Policy',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'food-systems',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 31,
                'name' => 'Food Systems',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'glacial-processes',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 32,
                'name' => 'Glacial Processes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'agriculture',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 1,
            	'parent_id' => 31,
                'name' => 'Agriculture',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'green-marketing',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 33,
                'name' => 'Green Marketing',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'geographic-information-science',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 34,
                'name' => 'Geographic Information Science',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'groundwater',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 35,
                'name' => 'Groundwater',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'human-health',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 36,
                'name' => 'Human Health',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'indigenous-knowledge',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 37,
                'name' => 'Indigenous Knowledge',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'land-use-change',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 38,
                'name' => 'Land Use Change',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'marine-ecology',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 39,
                'name' => 'Marine Ecology',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'multicultural-perspectives',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 40,
                'name' => 'Multicultural Perspectives',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'natural-capital',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 41,
                'name' => 'Natural Capital',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'natural-resource-management',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 42,
                'name' => 'Natural Resource Management',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'poverty',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 43,
                'name' => 'Poverty',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'public-health',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 44,
                'name' => 'Public Health',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'recreation',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 45,
                'name' => 'Recreation',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'recycling',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 46,
                'name' => 'Recycling',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'refugees',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 47,
                'name' => 'Refugees',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'renewable-energy',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 48,
            	'parent_id' => 25,
                'name' => 'Renewable Energy',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'riparian-ecology',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 49,
                'name' => 'Riparian Ecology',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'social-capital',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 50,
                'name' => 'Social Capital',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'social-equity',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 51,
                'name' => 'Social Equity',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'solar-energy-systems',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 52,
            	'parent_id' => 48,
                'name' => 'Solar Energy Systems',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'solid-waste',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 53,
                'name' => 'Solid Waste',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'tourism',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 54,
                'name' => 'Tourism',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'transportation',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 55,
                'name' => 'Transportation',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'urban-development',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 56,
                'name' => 'Urban Development',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'urban-infrastructure',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 57,
                'name' => 'Urban Infrastructure',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'water',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 58,
                'name' => 'Water',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'watersheds',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
                'order' => 59,
                'name' => 'Watersheds',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'wastewater-treatment',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 60,
                'name' => 'Wastewater Treatment',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $keyword = Keyword::firstOrNew([
            'slug' => 'water-resource-management',
        ]);
        if (!$keyword->exists) {
            $keyword->fill([
            	'order' => 61,
                'name' => 'Water Resource Management',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }
    }
}
