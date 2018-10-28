<?php

namespace SCCatalog\Repositories\Frontend\Opportunity;

use Illuminate\Support\Facades\DB;
use SCCatalog\Events\Frontend\OpportunityUser\UserFollowedOpportunity;
use SCCatalog\Events\Frontend\OpportunityUser\UserUnfollowedOpportunity;
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
    public function follow(Opportunity $opportunity, User $user, array $data)
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

            event(new UserFollowedOpportunity($opportunity, $user, $data));

            return $opportunity;
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
    public function unfollow(Opportunity $opportunity, User $user, array $data)
    {
        return DB::transaction(function () use ($opportunity, $user, $data) {

            $opportunity
                ->users()
                ->wherePivot('relationship_type_id', $data['relationship_type_id'])
                ->detach();

            event(new UserUnfollowedOpportunity($opportunity, $user, $data));

            return $opportunity;
        });
    }
}
