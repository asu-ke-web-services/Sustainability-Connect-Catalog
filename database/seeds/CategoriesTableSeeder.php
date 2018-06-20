<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::firstOrNew([
            'slug' => 'affordable-and-clean-energy',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 1,
                'name' => 'Affordable and Clean Energy',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'clean-water-and-sanitation',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 2,
                'name' => 'Clean Water and Sanitation',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'climate-action',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 3,
                'name' => 'Climate Action',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'decent-work-and-economic-growth',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 4,
                'name' => 'Decent Work and Economic Growth',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'gender-equality',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 5,
                'name' => 'Gender Equality',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'good-health-and-well-being',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 6,
                'name' => 'Good Health and Well-Being',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'industry-innovation-and-infrastructure',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 7,
                'name' => 'Industry, Innovation, and Infrastructure',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'life-below-water',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 8,
                'name' => 'Life Below Water',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'life-on-land',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 9,
                'name' => 'Life On Land',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'no-poverty',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 10,
                'name' => 'No Poverty',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'partnership-for-the-goals',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 11,
                'name' => 'Partnership for the Goals',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'peace-justice-and-strong-institutions',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 12,
                'name' => 'Peace, Justice, and Strong Institutions',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'quality-education',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 13,
                'name' => 'Quality Education',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'reduced-inequalities',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 14,
                'name' => 'Reduced Inequalities',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'responsible-consumption-and-production',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 15,
                'name' => 'Responsible Consumption and Production',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'sustainable-cities-and-communities',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 16,
                'name' => 'Sustainable Cities and Communities',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'zero-hunger',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 17,
                'name' => 'Zero Hunger',
            ])->save();
        }
    }
}
