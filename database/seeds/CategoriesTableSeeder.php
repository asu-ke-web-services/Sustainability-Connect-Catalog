<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Lookup\Category;

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
            'slug' => 'culminating-experience',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name' => 'Culminating Experience',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'global-development-research-gdr',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name' => 'Global Development Research (GDR)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'internship',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name' => 'Internship',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'practicum',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name' => 'Practicum',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'research',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name' => 'Research',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'workshop',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name' => 'Workshop',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }
    }
}
