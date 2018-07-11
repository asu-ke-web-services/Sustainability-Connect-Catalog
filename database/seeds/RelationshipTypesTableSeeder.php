<?php

use Illuminate\Database\Seeder;
use SCCatalog\Models\RelationshipType;

class RelationshipTypesTableSeeder extends Seeder
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
        DB::table('relationship_types')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create();

        $category = RelationshipType::firstOrNew([
            'slug' => 'follower',
        ]);
        if (!$category->exists) {
            $category->fill([
                'order' => 0,
                'name' => 'Follower',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $category = RelationshipType::firstOrNew([
            'slug' => 'applicant',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 1,
                'name' => 'Applicant',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $category = RelationshipType::firstOrNew([
            'slug' => 'participant',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 2,
                'name' => 'Participant',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $category = RelationshipType::firstOrNew([
            'slug' => 'manager',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 3,
                'name' => 'Manager',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $category = RelationshipType::firstOrNew([
            'slug' => 'practitioner-mentor',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 4,
                'name' => 'Practitioner Mentor',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $category = RelationshipType::firstOrNew([
            'slug' => 'academic-mentor',
        ]);
        if (!$category->exists) {
            $category->fill([
            	'order' => 5,
                'name' => 'Academic Mentor',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }
    }
}
