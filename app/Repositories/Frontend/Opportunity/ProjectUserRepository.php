<?php

namespace SCCatalog\Repositories\Frontend\Opportunity;

use Illuminate\Support\Facades\DB;
use SCCatalog\Events\Frontend\OpportunityUser\UserFollowedProject;
use SCCatalog\Events\Frontend\OpportunityUser\UserUnfollowedProject;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Models\Auth\User;

/**
 * Class ProjectUserRepository
 */
class ProjectUserRepository
{
    /**
     * Create a new user relationship record between a user and project in the database.
     *
     * @param Project $project
     * @param User $user
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function follow(Project $project, User $user, array $data)
    {
        return DB::transaction(function () use ($project, $user, $data) {

            $project
                ->users()
                ->attach(
                    $user->id,
                    [
                        'relationship_type_id' => $data['relationship_type_id'] ?? 2,
                        'comments'              => $data['comments'] ?? null,
                    ]
                );

            event(new UserFollowedProject($project, $user, $data));

            return $project;
        });
    }

    /**
     * Remove a relationship from between an project and user in the database.
     *
     * @param Project $project
     * @param User $user
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function unfollow(Project $project, User $user, array $data)
    {
        return DB::transaction(function () use ($project, $user, $data) {

            $project
                ->users()
                ->wherePivot('relationship_type_id', $data['relationship_type_id'])
                ->detach();

            event(new UserUnfollowedProject($project, $user, $data));

            return $project;
        });
    }
}
