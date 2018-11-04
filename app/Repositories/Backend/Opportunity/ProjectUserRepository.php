<?php

namespace SCCatalog\Repositories\Backend\Opportunity;

use Illuminate\Support\Facades\DB;
use SCCatalog\Events\Backend\OpportunityUser\UserAddedToProject;
use SCCatalog\Events\Backend\OpportunityUser\ProjectUserRelationshipUpdated;
use SCCatalog\Events\Backend\OpportunityUser\UserRemovedFromProject;
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
    public function attach(Project $project, User $user, array $data)
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

            event(new UserAddedToProject($project, $user, $data));

            return $project;

            // if (

            // ) {
            //     event(new UserAddedToProject($project, $user, $data));

            //     return $project;
            // }

            // throw new GeneralException(__('exceptions.backend.opportunity.users.attach_error'));
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
                        'comments'              => $data['comments'] ?? null,
                    ]
                );

            event(new ProjectUserRelationshipUpdated($project, $user, $data));

            return $project;

            // if (

            // ) {
            //     event(new ProjectUserRelationshipUpdated($project, $user, $data));

            //     return $project;
            // }

            // throw new GeneralException(__('exceptions.backend.opportunity.users.update_error'));
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

            // if (
            // ) {

            //     event(new UserRemovedFromProject($project, $user, $data));

            //     return $project;
            // }

            // throw new GeneralException(__('exceptions.backend.opportunity.users.detach_error'));
        });
    }
}
