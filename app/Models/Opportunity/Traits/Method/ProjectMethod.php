<?php

namespace SCCatalog\Models\Opportunity\Traits\Method;

use Carbon\Carbon;

/**
 * Trait ProjectMethod.
 */
trait ProjectMethod
{
    /**
     * Get the published status of this model.
     *
     * @return bool
     */
    public function isPublished()
    {
        return \in_array($this->opportunity_status_id, [
            3, // Seeking Champions
            4, // Recruiting Participants
            5, // Positions Filled
            6, // In Progress
            7, // Completed
        ], true);
    }

    /**
     * Should project be listed as active listing?.
     *
     * @return bool
     */
    public function isActive()
    {
        return
            $this->listing_start_at !== null &&
            $this->listing_start_at->lessThan(Carbon::tomorrow()) &&
            $this->listing_end_at !== null &&
            $this->listing_end_at->greaterThan(Carbon::today()) &&
            \in_array($this->opportunity_status_id, [
                3, // Seeking Champions
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ], true);
    }

    /**
     * Should project be listed as expired listing?.
     *
     * @return bool
     */
    public function isExpired()
    {
        return
            $this->listing_end_at !== null &&
            $this->listing_end_at->greaterThan(Carbon::tomorrow()) &&
            \in_array($this->opportunity_status_id, [
                3, // Seeking Champions
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ], true);
    }

    /**
     * Is project in Open status but without Listing Dates?
     *
     * @return bool
     */
    public function isInvalidOpen()
    {
        return
            empty($this->listing_end_at) &&
            \in_array($this->opportunity_status_id, [
                3, // Seeking Champions
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ], true);
    }

    /**
     * Should project be listed as a Future listing?.
     *
     * @return bool
     */
    public function isFuture()
    {
        return
            $this->listing_start_at !== null &&
            $this->listing_start_at->greaterThan(Carbon::tomorrow()) &&
            \in_array($this->opportunity_status_id, [
                3, // Seeking Champions
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
            ], true);
    }

    /**
     * Should project be listed as a completed past project? Not exact inverse of isActive().
     *
     * @return bool
     */
    public function isCompleted()
    {
        return 7 === $this->opportunity_status_id;

        // return (
        // $this->isPublished() &&
        // null !== $this->listing_start_at &&
        // null !== $this->listing_end_at &&
        // $this->listing_start_at->lessThan(Carbon::today()) &&
        // $this->listing_end_at->greaterThan(Carbon::today())
        // );
    }
}
