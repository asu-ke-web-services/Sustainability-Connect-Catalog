<?php

namespace SCCatalog\Services;

use SCCatalog\Models\Opportunity;
use SCCatalog\Models\RelationshipType;
use SCCatalog\Models\User;

class OpportunityService
{
    /**
     * Execute the requested service task.
     *
     * @return void
     */
    public function createOpportunity(Request $request)
    {

    }

    /**
     * Execute the requested service task.
     *
     * @return void
     */
    public function updateOpportunity(Request $request)
    {

    }

    /**
     * Execute the requested service task.
     *
     * @return void
     */
    public function follow(Request $request)
    {
        $relationship = RelationshipType::where('slug', 'follower')

        $this->opportunity->allRelatedUsers()->syncWithoutDetaching([
            $this->user->id => ['relationship_type_id' => $relationship->id],
        ]);
    }

}
