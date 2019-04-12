<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Lookup\Keyword;

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
                'name' => 'Water Resource Management',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }
    }
}
