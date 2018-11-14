<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Lookup\BudgetType;
use SCCatalog\Models\Lookup\OpportunityStatus;
use SCCatalog\Models\Lookup\OpportunityReviewStatus;

class OpportunityTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pre-fill Opportunity Status options

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'new-proposal',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
                'opportunity_type_id' => 2,
                'name'                => 'New Proposal',
                'indicates_published' => 0,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'archived',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
                'opportunity_type_id' => 2,
                'name'                => 'Archived',
                'indicates_published' => 0,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'seeking-champion',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
                'opportunity_type_id' => 2,
                'name'                => 'Seeking Champion',
                'indicates_published' => 1,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'recruiting',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
                'opportunity_type_id' => 2,
                'name'                => 'Recruiting Participants',
                'indicates_published' => 1,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'filled',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
                'opportunity_type_id' => 2,
                'name'                => 'Positions Filled',
                'indicates_published' => 1,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'in-progress',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
                'opportunity_type_id' => 2,
                'name'                => 'In Progress',
                'indicates_published' => 1,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'completed',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
                'opportunity_type_id' => 2,
                'name'                => 'Completed',
                'indicates_published' => 1,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'inactive',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
                'opportunity_type_id' => 3,
                'name'                => 'Inactive',
                'indicates_published' => 0,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'active',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
                'opportunity_type_id' => 3,
                'name'                => 'Active',
                'indicates_published' => 1,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }


        // Pre-fill Opportunity Review Status options

        $opportunity_review_statuses = OpportunityReviewStatus::firstOrNew([
            'slug' => 'needs-review',
        ]);
        if (!$opportunity_review_statuses->exists) {
            $opportunity_review_statuses->fill([
                'opportunity_type_id' => 2,
                'name'                => 'Needs Review',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_review_statuses = OpportunityReviewStatus::firstOrNew([
            'slug' => 'review-in-progress',
        ]);
        if (!$opportunity_review_statuses->exists) {
            $opportunity_review_statuses->fill([
                'opportunity_type_id' => 2,
                'name'                => 'Review in Progress',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_review_statuses = OpportunityReviewStatus::firstOrNew([
            'slug' => 'approved',
        ]);
        if (!$opportunity_review_statuses->exists) {
            $opportunity_review_statuses->fill([
                'opportunity_type_id' => 2,
                'name'                => 'Approved',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_review_statuses = OpportunityReviewStatus::firstOrNew([
            'slug' => 'not-approved',
        ]);
        if (!$opportunity_review_statuses->exists) {
            $opportunity_review_statuses->fill([
                'opportunity_type_id' => 2,
                'name'                => 'Not Approved',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        // Pre-fill Budget Type options

        $budget_types = BudgetType::firstOrNew([
            'slug' => 'monetary',
        ]);
        if (!$budget_types->exists) {
            $budget_types->fill([
                'name'                => 'Monetary',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $budget_types = BudgetType::firstOrNew([
            'slug' => 'hr',
        ]);
        if (!$budget_types->exists) {
            $budget_types->fill([
                'name'                => 'HR',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $budget_types = BudgetType::firstOrNew([
            'slug' => 'other',
        ]);
        if (!$budget_types->exists) {
            $budget_types->fill([
                'name'                => 'Other',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }
    }
}
