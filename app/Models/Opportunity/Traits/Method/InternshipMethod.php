<?php

namespace SCCatalog\Models\Opportunity\Traits\Method;

use Carbon\Carbon;

/**
 * Trait InternshipMethod.
 */
trait InternshipMethod
{
    /**
     * Get the published status of this model.
     *
     * @return bool
     */
    public function isPublished()
    {
        return (9 === $this->opportunity_status_id &&
            null !== $this->application_deadline_at &&
            $this->application_deadline_at->greaterThan(Carbon::yesterday())

            // $this->listing_start_at !== null &&
            // $this->listing_start_at->lessThan(Carbon::today()) &&
            // $this->listing_end_at !== null &&
            // $this->listing_end_at->greaterThan(Carbon::today())
        );
    }

    /**
     * Get the active status of this model (required for consistency with Internship in React SearchApp.)
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->isPublished();
    }
}
