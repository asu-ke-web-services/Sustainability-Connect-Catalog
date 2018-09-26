<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Lookup\UserType;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $type = UserType::firstOrNew([
            'slug' => 'student',
        ]);
        if (!$type->exists) {
            $type->fill([
            	'order' => 1,
                'name' => 'Student',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $type = UserType::firstOrNew([
            'slug' => 'alumni',
        ]);
        if (!$type->exists) {
            $type->fill([
            	'order' => 2,
                'name' => 'Alumni',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $type = UserType::firstOrNew([
            'slug' => 'faculty',
        ]);
        if (!$type->exists) {
            $type->fill([
            	'order' => 3,
                'name' => 'Faculty',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $type = UserType::firstOrNew([
            'slug' => 'staff',
        ]);
        if (!$type->exists) {
            $type->fill([
            	'order' => 4,
                'name' => 'Staff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $type = UserType::firstOrNew([
            'slug' => 'professional',
        ]);
        if (!$type->exists) {
            $type->fill([
            	'order' => 5,
                'name' => 'Professional/Non-ASU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }
    }
}
