<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Lookup\AttachmentStatus;

class AttachmentStatusesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $type = AttachmentStatus::firstOrNew([
            'slug' => 'public',
        ]);
        if (!$type->exists) {
            $type->fill([
                'name' => 'Public',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $type = AttachmentStatus::firstOrNew([
            'slug' => 'private',
        ]);
        if (!$type->exists) {
            $type->fill([
                'name' => 'Private',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }
    }
}
