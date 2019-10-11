<?php

namespace SCCatalog\Models\Opportunity\Traits\Scope;

use Carbon\Carbon;

/**
 * Trait InternshipScope.
 */
trait InternshipScope
{
    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query
            ->where([
                ['application_deadline_at', '<>', null],
                ['application_deadline_at', '>', Carbon::yesterday()],
            ])
            ->where('opportunity_status_id', 9);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeInactive($query)
    {
        return $query
            ->where('opportunity_status_id', 8);
        // ->where('application_deadline_at', null, '!==')
        // ->where('application_deadline_at', Carbon::today(), '>');
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
