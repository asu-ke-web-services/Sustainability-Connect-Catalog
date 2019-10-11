<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Lookup\StudentDegreeLevel;

class StudentDegreeLevelsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $category = StudentDegreeLevel::firstOrNew([
            'slug' => 'bachelors',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name' => 'Bachelors',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $category = StudentDegreeLevel::firstOrNew([
            'slug' => 'masters',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name' => 'Masters',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $category = StudentDegreeLevel::firstOrNew([
            'slug' => 'doctoral',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name' => 'Doctoral',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $category = StudentDegreeLevel::firstOrNew([
            'slug' => 'professional',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name' => 'Professional',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $category = StudentDegreeLevel::firstOrNew([
            'slug' => 'non-degree',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name' => 'Non-Degree Seeking',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }
    }
}
