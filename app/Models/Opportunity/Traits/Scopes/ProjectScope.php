<?php

namespace SCCatalog\Models\Opportunity\Traits\Scope;

use Carbon\Carbon;

/**
 * Trait ProjectScope.
 */
trait ProjectScope
{
    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where([
            ['listing_start_at', '<>', null],
            ['listing_start_at', '<', Carbon::tomorrow()],
            ['listing_end_at', '<>', null],
            ['listing_end_at', '>', Carbon::today()],
        ])
            ->whereIn('opportunity_status_id', [
                3, // Seeking Champion
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ]);
    }

    /**
     * Correctly published projects that have expired off the active listings
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeExpired($query)
    {
        return $query
            ->where([
                ['listing_end_at', '<>', null],
                ['listing_end_at', '<', Carbon::tomorrow()],
            ])
            ->whereIn('opportunity_status_id', [
                3, // Seeking Champion
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ]);
    }

    /**
     * Open projects that were never updated with listing dates
     * @param $query
     *
     * @return mixed
     */
    public function scopeInvalidOpen($query)
    {
        return $query
            ->whereNull('listing_end_at')
            ->whereIn('opportunity_status_id', [
                3, // Seeking Champion
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ]);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeFuture($query)
    {
        return $query->where([
            ['listing_start_at', '<>', null],
            ['listing_start_at', '>', Carbon::tomorrow()],
        ])
            ->whereIn('opportunity_status_id', [
                3, // Seeking Champion
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ]);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeCompleted($query)
    {
        return $query->where('opportunity_status_id', 7);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeArchived($query)
    {
        return $query->whereIn('opportunity_status_id', [
            2, // Archived
        ]);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->whereIn('opportunity_status_id', [
            3, // Seeking Champion
            4, // Recruiting Participants
            5, // Positions Filled
            6, // In Progress
            7, // Completed
        ]);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeProposalNeedsReview($query)
    {
        return $query->where([
            ['opportunity_status_id', 1], // New Proposal
            ['review_status_id', 1], // Needs Review
        ]);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeInReview($query)
    {
        return $query->where([
            ['opportunity_status_id', 1], // New Proposal
            ['review_status_id', 2], // Review in Progress
        ]);
    }

    /**
     * @param $query
     * @param bool $approved
     *
     * @return mixed
     */
    public function scopeApproved($query, $approved = true)
    {
        if ($approved) {
            return $query->where('review_status_id', 3);
        }
        // Closed or archived or otherwise not approved
        return $query->whereIn('review_status_id', [
                1, // Needs Review
                2, // Review In Progress
                4, // Not Approved
            ]);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeNeedsImportReview($query)
    {
        return $query->where('needs_review', 1);
    }
}
