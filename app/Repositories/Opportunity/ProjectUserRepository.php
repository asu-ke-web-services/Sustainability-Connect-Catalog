<?php

namespace SCCatalog\Repositories\Opportunity;

use Illuminate\Support\Facades\DB;
use SCCatalog\Events\Backend\OpportunityUser\UserAddedToProject;
use SCCatalog\Events\Backend\OpportunityUser\ProjectUserRelationshipUpdated;
use SCCatalog\Events\Backend\OpportunityUser\UserRemovedFromProject;
use SCCatalog\Events\Frontend\OpportunityUser\UserCancelledRequestToJoinProject;
use SCCatalog\Events\Frontend\OpportunityUser\UserFollowedProject;
use SCCatalog\Events\Frontend\OpportunityUser\UserRequestedToJoinProject;
use SCCatalog\Events\Frontend\OpportunityUser\UserUnfollowedProject;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Auth\User;
use SCCatalog\Models\Opportunity\Project;

/**
 * Class ProjectUserRepository
 */
class ProjectUserRepository
{
    /**
     * Create a new Applicant user relationship record between a user and project in the database.
     *
     * @param Project $project
     * @param User $user
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function apply(Project $project, User $user, array $data)
    {
        return DB::transaction(function () use ($project, $user, $data) {
            $project
                ->users()
                ->attach(
                    $user->id,
                    [
                        'relationship_type_id' => $data['relationship_type_id'] ?? 2,
                        'comments' => $data['comments'] ?? null,
                    ]
                );

            event(new UserRequestedToJoinProject($project, $user));

            return $project;
        });
    }

    /**
     * Cancel a user application for project.
     *
     * @param Project $project
     * @param User $user
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function cancelApplication(Project $project, User $user, array $data)
    {
        return DB::transaction(function () use ($project, $user, $data) {
            $project
                ->users()
                ->wherePivot('relationship_type_id', $data['relationship_type_id'])
                ->detach();

            event(new UserCancelledRequestToJoinProject($project, $user));

            return $project;
        });
    }

    /**
     * Create a new Follower user relationship record between a user and project in the database.
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
                        'comments' => $data['comments'] ?? null,
                    ]
                );

            event(new UserFollowedProject($project, $user));

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

            event(new UserUnfollowedProject($project, $user));

            return $project;
        });
    }

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
    public function attach(Project $project, User $user, array $data)
    {
        return DB::transaction(function () use ($project, $user, $data) {
            $project
                ->users()
                ->attach(
                    $user->id,
                    [
                        'relationship_type_id' => $data['relationship_type_id'] ?? 2,
                        'comments' => $data['comments'] ?? null,
                    ]
                );

            event(new UserAddedToProject($project, $user, $data));

            return $project;
        });
    }

    /**
     * Update an Project User relationship record in the database.
     *
     * @param Project $project
     * @param User $user
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function update(Project $project, User $user, array $data)
    {
        // $project->loadMissing(
        //         'applicants',
        //         'participants'
        //     );

        return DB::transaction(function () use ($project, $user, $data) {
            $project
                ->users()
                ->updateExistingPivot(
                    $user->id,
                    [
                        'relationship_type_id' => $data['relationship_type_id'] ?? 2,
                        'comments' => $data['comments'] ?? null,
                    ]
                );

            event(new ProjectUserRelationshipUpdated($project, $user, $data));

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
    public function detach(Project $project, User $user, array $data)
    {
        return DB::transaction(function () use ($project, $user, $data) {
            $project
                ->users()
                ->wherePivot('relationship_type_id', $data['relationship_type_id'])
                ->detach();

            event(new UserRemovedFromProject($project, $user, $data));

            return $project;
        });
    }
}
