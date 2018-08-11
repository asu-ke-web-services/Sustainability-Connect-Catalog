<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Category;

class CategoriesTableSeeder extends Seeder
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
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $category = Category::firstOrNew([
            'slug' => 'culminating-experience',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 1,
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
            	'order' => 2,
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
            	'order' => 3,
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
            	'order' => 4,
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
            	'order' => 5,
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
            	'order' => 6,
                'name' => 'Workshop',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }
    }
}
