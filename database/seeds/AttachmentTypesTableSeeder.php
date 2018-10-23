<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Lookup\AttachmentType;

class AttachmentTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $type = AttachmentType::firstOrNew([
            'slug' => 'final-report',
        ]);
        if (!$type->exists) {
            $type->fill([
            	'order' => 1,
                'name' => 'Final Report',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $type = AttachmentType::firstOrNew([
            'slug' => 'other',
        ]);
        if (!$type->exists) {
            $type->fill([
            	'order' => 2,
                'name' => 'other',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }
    }
}
