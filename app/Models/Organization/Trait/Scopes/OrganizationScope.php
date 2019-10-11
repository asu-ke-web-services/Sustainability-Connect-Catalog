<?php

namespace SCCatalog\Models\Organization\Traits\Scope;

/**
 * Trait OrganizationScope.
 */
trait OrganizationScope
{
    /**
     * @param $query
     * @param bool $active
     * @return mixed
     */
    public function scopeActive($query, $active = true)
    {
        if ($active) {
            return $query
                ->whereIn('organization_status_id', [
                    2, // Active
                ]);
        }
        // Closed or archived or otherwise not approved
        return $query
            ->whereIn('organization_status_id', [
                1, // Inactive
            ]);
    }
}
