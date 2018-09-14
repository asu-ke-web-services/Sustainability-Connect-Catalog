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
            'slug' => 'idea-submission',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
                'order'               => 1,
                'opportunity_type_id' => 1,
                'name'                => 'Idea Submission',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_statuses = OpportunityStatus::firstOrNew([
            'slug' => 'closed',
        ]);
        if (!$opportunity_statuses->exists) {
            $opportunity_statuses->fill([
                'order'               => 2,
                'opportunity_type_id' => 1,
                'name'                => 'Archived/Closed',
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
                'order'               => 3,
                'opportunity_type_id' => 1,
                'name'                => 'Seeking Champion',
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
                'order'               => 4,
                'opportunity_type_id' => 1,
                'name'                => 'Recruiting Participants',
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
                'order'               => 5,
                'opportunity_type_id' => 1,
                'name'                => 'Positions Filled',
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
                'order'               => 6,
                'opportunity_type_id' => 1,
                'name'                => 'In Progress',
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
                'order'               => 7,
                'opportunity_type_id' => 1,
                'name'                => 'Completed',
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
                'order'               => 1,
                'opportunity_type_id' => 2,
                'name'                => 'Inactive',
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
                'order'               => 2,
                'opportunity_type_id' => 2,
                'name'                => 'Active',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }


        // Pre-fill Opportunity Review Status options

        $opportunity_review_statuses = OpportunityReviewStatus::firstOrNew([
            'slug' => 'approved',
        ]);
        if (!$opportunity_review_statuses->exists) {
            $opportunity_review_statuses->fill([
                'order'               => 1,
                'opportunity_type_id' => 1,
                'name'                => 'Approved',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_review_statuses = OpportunityReviewStatus::firstOrNew([
            'slug' => 'archived',
        ]);
        if (!$opportunity_review_statuses->exists) {
            $opportunity_review_statuses->fill([
                'order'               => 2,
                'opportunity_type_id' => 1,
                'name'                => 'Archived',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_review_statuses = OpportunityReviewStatus::firstOrNew([
            'slug' => 'in-review',
        ]);
        if (!$opportunity_review_statuses->exists) {
            $opportunity_review_statuses->fill([
                'order'               => 3,
                'opportunity_type_id' => 1,
                'name'                => 'In Review',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_review_statuses = OpportunityReviewStatus::firstOrNew([
            'slug' => 'hidden',
        ]);
        if (!$opportunity_review_statuses->exists) {
            $opportunity_review_statuses->fill([
                'order'               => 4,
                'opportunity_type_id' => 1,
                'name'                => 'Hidden',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_review_statuses = OpportunityReviewStatus::firstOrNew([
            'slug' => 'draft',
        ]);
        if (!$opportunity_review_statuses->exists) {
            $opportunity_review_statuses->fill([
                'order'               => 5,
                'opportunity_type_id' => 1,
                'name'                => 'Draft',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }

        $opportunity_review_statuses = OpportunityReviewStatus::firstOrNew([
            'slug' => 'trash',
        ]);
        if (!$opportunity_review_statuses->exists) {
            $opportunity_review_statuses->fill([
                'order'               => 6,
                'opportunity_type_id' => 1,
                'name'                => 'Trash',
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
                'order'               => 1,
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
                'order'               => 2,
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
                'order'               => 3,
                'name'                => 'Other',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_by'          => 1,
            ])->save();
        }
    }
}
