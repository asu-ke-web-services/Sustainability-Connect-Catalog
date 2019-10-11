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

    public function shouldBeSearchable()
    {
        return $this->isPublished();
    }

    public function toSearchableArray()
    {
        $project = [];

        $project['id'] = $this->id;
        $project['active'] = $this->isActive();
        // $project['completed']               = $this->isCompleted();
        $project['name'] = e($this->name);
        $project['description'] = e($this->description);
        $project['opportunityStartAt'] = $this->opportunity_start_at ? $this->opportunity_start_at->getTimestamp() : null;
        $project['opportunityEndAt'] = $this->opportunity_end_at ? $this->opportunity_end_at->getTimestamp() : null;
        $project['applicationDeadlineAt'] = $this->application_deadline_at ? $this->application_deadline_at->getTimestamp() : null;
        $project['applicationDeadlineText'] = e($this->application_deadline_text);
        $project['listingStartAt'] = $this->listing_start_at ? $this->listing_start_at->getTimestamp() : null;
        $project['listingEndAt'] = $this->listing_end_at ? $this->listing_end_at->getTimestamp() : null;
        $project['followerCount'] = $this->follower_count;
        $project['status'] = null !== $this->status ? e($this->status->name) : null;
        $project['reviewStatus'] = null !== $this->reviewStatus ? e($this->reviewStatus->name) : null;
        $project['organizationName'] = null !== $this->organization ? e($this->organization->name) : null;

        // Index Location Cities
        $project['locations'] = '';
        foreach ($this->addresses as $address) {
            $project['locations'] .= e($address['city']) . ' ' . e($address['state']);
        }

        // Index Affiliations
        $project['affiliations'] = $this->affiliations->map(function ($data) {
            return e($data['name']);
        })->toArray();

        // Index AccessAffiliations
        $project['accessAffiliations'] = $this->affiliations->where('access_control', true)->map(function ($data) {
            return [
                'name' => e($data['name']),
                'slug' => e($data['slug']),
            ];
        })->toArray();

        // Index AffiliationIcons
        $project['affiliationIcons'] = $this->affiliations->map(function ($data) {
            return [
                'slug' => e($data['slug']),
                'frontend_fa_icon' => json_decode($data['frontend_fa_icon']),
                'backend_fa_icon' => json_decode($data['backend_fa_icon']),
                'help_text' => $data['help_text'],
            ];
        })->toArray();

        // Index Categories names
        $project['categories'] = $this->categories->map(function ($data) {
            return e($data['name']);
        })->toArray();

        // Index Keywords names
        $project['keywords'] = $this->keywords->map(function ($data) {
            return e($data['name']);
        })->toArray();

        return $project;
    }
}
