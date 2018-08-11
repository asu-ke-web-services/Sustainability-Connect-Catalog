<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\StudentDegreeLevel;

class StudentDegreeLevelsTableSeeder extends Seeder
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
        DB::table('student_degree_levels')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create();

        $category = StudentDegreeLevel::firstOrNew([
            'slug' => 'bachelors',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 1,
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
            	'order' => 2,
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
            	'order' => 3,
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
            	'order' => 4,
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
            	'order' => 5,
                'name' => 'Non-Degree Seeking',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }
    }
}
