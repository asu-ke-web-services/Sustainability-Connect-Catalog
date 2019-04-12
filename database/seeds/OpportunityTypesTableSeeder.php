<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Lookup\OpportunityType;

class OpportunityTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pre-fill Opportunity Type options

        $opportunity_types = OpportunityType::firstOrNew([
            'slug' => 'all',
        ]);
        if (!$opportunity_types->exists) {
            $opportunity_types->fill([
                'name' => 'All',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $opportunity_types = OpportunityType::firstOrNew([
            'slug' => 'project',
        ]);
        if (!$opportunity_types->exists) {
            $opportunity_types->fill([
                'name' => 'Project',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $opportunity_types = OpportunityType::firstOrNew([
            'slug' => 'internship',
        ]);
        if (!$opportunity_types->exists) {
            $opportunity_types->fill([
                'name' => 'Internship',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }
    }
}
