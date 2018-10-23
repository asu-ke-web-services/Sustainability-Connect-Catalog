<?php

namespace SCCatalog\Repositories\Frontend\Opportunity;

use Illuminate\Support\Facades\DB;
use SCCatalog\Events\Frontend\OpportunityUser\UserAddedToOpportunity;
use SCCatalog\Events\Frontend\OpportunityUser\UserRemovedFromOpportunity;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Opportunity\Opportunity;
use SCCatalog\Models\Auth\User;

/**
 * Class OpportunityUserRepository
 */
class OpportunityUserRepository
{
    /**
     * Create a new user relationship record between a user and opportunity in the database.
     *
     * @param Opportunity $opportunity
     * @param User $user
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function attach(Opportunity $opportunity, User $user, array $data)
    {
        return DB::transaction(function () use ($opportunity, $user, $data) {

            $opportunity
                ->users()
                ->attach(
                    $user->id,
                    [
                        'relationship_type_id' => $data['relationship_type_id'] ?? 2,
                        'comments'              => $data['comments'] ?? null,
                    ]
                );

            event(new UserAddedToOpportunity($opportunity, $user, $data));

            return $opportunity;

            // if (

            // ) {
            //     event(new UserAddedToOpportunity($opportunity, $user, $data));

            //     return $opportunity;
            // }

            // throw new GeneralException(__('exceptions.backend.opportunity.users.attach_error'));
        });
    }

    /**
     * Remove a relationship from between an opportunity and user in the database.
     *
     * @param Opportunity $opportunity
     * @param User $user
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function detach(Opportunity $opportunity, User $user, array $data)
    {
        return DB::transaction(function () use ($opportunity, $user, $data) {

            $opportunity
                ->users()
                ->wherePivot('relationship_type_id', $data['relationship_type_id'])
                ->detach();

            event(new UserRemovedFromOpportunity($opportunity, $user, $data));

            return $opportunity;

            // if (
            // ) {

            //     event(new UserRemovedFromOpportunity($opportunity, $user, $data));

            //     return $opportunity;
            // }

            // throw new GeneralException(__('exceptions.backend.opportunity.users.detach_error'));
        });
    }
}
