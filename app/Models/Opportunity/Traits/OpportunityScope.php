<?php

namespace SCCatalog\Models\Opportunity\Traits;

/**
 * Class OpportunityScope.
 */
trait OpportunityScope
{
    /**
     * @param $query
     * @param bool $closed
     *
     * @return mixed
     */
    public function scopeClosed($query, $closed = true)
    {
        return $query->where('status', $closed);
    }

    /**
     * @param $query
     * @param bool $status
     *
     * @return mixed
     */
    public function scopeActive($query, $status = true)
    {
        return $query->where('active', $status);
    }
}
