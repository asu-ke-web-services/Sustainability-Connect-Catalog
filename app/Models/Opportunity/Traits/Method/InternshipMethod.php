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

    /**
     * @return bool
     */
    public function shouldBeSearchable()
    {
        return $this->isPublished();
    }

    /**
     * @return array
     */
    public function toSearchableArray()
    {
        $internship = [];

        $internship['id'] = $this->id;
        $internship['active'] = $this->isActive();
        $internship['name'] = e($this->name);
        $internship['description'] = e($this->description);
        $internship['opportunityStartAt'] = $this->opportunity_start_at ? $this->opportunity_start_at->getTimestamp() : null;
        $internship['opportunityEndAt'] = $this->opportunity_end_at ? $this->opportunity_end_at->getTimestamp() : null;
        $internship['applicationDeadlineAt'] = $this->application_deadline_at ? $this->application_deadline_at->getTimestamp() : null;
        $internship['applicationDeadlineText'] = e($this->application_deadline_text);
        $internship['listingStartAt'] = $this->listing_start_at ? $this->listing_start_at->getTimestamp() : null;
        $internship['listingEndAt'] = $this->listing_end_at ? $this->listing_end_at->getTimestamp() : null;
        $internship['followerCount'] = $this->follower_count;
        $internship['status'] = e($this->status->name);
        $internship['organizationName'] = e($this->organization->name) ?? '';

        // Index Location Cities
        $internship['locations'] = '';
        foreach ($this->addresses as $address) {
            $internship['locations'] .= e($address['city']) . ' ' . e($address['state']);
        }

        // Index Affiliations
        $internship['affiliations'] = $this->affiliations->map(function ($data) {
            return e($data['name']);
        })->toArray();

        // Index AccessAffiliations
        $internship['accessAffiliations'] = $this->affiliations->where('access_control', true)->map(function ($data) {
            return [
                'name' => e($data['name']),
                'slug' => e($data['slug']),
            ];
        })->toArray();

        // Index AffiliationIcons
        $internship['affiliationIcons'] = $this->affiliations->map(function ($data) {
            return [
                'slug' => e($data['slug']),
                'frontend_fa_icon' => json_decode($data['frontend_fa_icon']),
                'backend_fa_icon' => json_decode($data['backend_fa_icon']),
                'help_text' => $data['help_text'],
            ];
        })->toArray();

        // Index Categories names
        $internship['categories'] = $this->categories->map(function ($data) {
            return e($data['name']);
        })->toArray();

        // Index Keywords names
        $internship['keywords'] = $this->keywords->map(function ($data) {
            return e($data['name']);
        })->toArray();

        return $internship;
    }
}
