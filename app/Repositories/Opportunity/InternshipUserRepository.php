<?php

namespace SCCatalog\Repositories\Opportunity;

use Illuminate\Support\Facades\DB;
use SCCatalog\Events\Backend\OpportunityUser\UserCancelledRequestToJoinInternship;
use SCCatalog\Events\Backend\OpportunityUser\UserFollowedInternship;
use SCCatalog\Events\Backend\OpportunityUser\UserRequestedToJoinInternship;
use SCCatalog\Events\Backend\OpportunityUser\UserUnfollowedInternship;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Models\Auth\User;
use SCCatalog\Events\Backend\OpportunityUser\UserAddedToInternship;
use SCCatalog\Events\Backend\OpportunityUser\InternshipUserRelationshipUpdated;
use SCCatalog\Events\Backend\OpportunityUser\UserRemovedFromInternship;

/**
 * Class InternshipUserRepository
 */
class InternshipUserRepository
{
    /**
     * Create a new Applicant user relationship record between a user and internship in the database.
     *
     * @param Internship $internship
     * @param User $user
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function apply(Internship $internship, User $user, array $data)
    {
        return DB::transaction(function () use ($internship, $user, $data) {
            $internship
                ->users()
                ->attach(
                    $user->id,
                    [
                        'relationship_type_id' => $data['relationship_type_id'] ?? 2,
                        'comments' => $data['comments'] ?? null,
                    ]
                );

            event(new UserRequestedToJoinInternship($internship, $user));

            return $internship;
        });
    }

    /**
     * Cancel a user application for internship.
     *
     * @param Internship $internship
     * @param User $user
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function cancelApplication(Internship $internship, User $user, array $data)
    {
        return DB::transaction(function () use ($internship, $user, $data) {
            $internship
                ->users()
                ->wherePivot('relationship_type_id', $data['relationship_type_id'])
                ->detach();

            event(new UserCancelledRequestToJoinInternship($internship, $user));

            return $internship;
        });
    }

    /**
     * Create a new user relationship record between a user and internship in the database.
     *
     * @param Internship $internship
     * @param User $user
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function follow(Internship $internship, User $user, array $data)
    {
        return DB::transaction(function () use ($internship, $user, $data) {
            $internship
                ->users()
                ->attach(
                    $user->id,
                    [
                        'relationship_type_id' => $data['relationship_type_id'] ?? 2,
                        'comments' => $data['comments'] ?? null,
                    ]
                );

            event(new UserFollowedInternship($internship, $user, $data));

            return $internship;
        });
    }

    /**
     * Remove a relationship from between an internship and user in the database.
     *
     * @param Internship $internship
     * @param User $user
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function unfollow(Internship $internship, User $user, array $data)
    {
        return DB::transaction(function () use ($internship, $user, $data) {
            $internship
                ->users()
                ->wherePivot('relationship_type_id', $data['relationship_type_id'])
                ->detach();

            event(new UserUnfollowedInternship($internship, $user, $data));

            return $internship;
        });
    }

    /**
     * Create a new user relationship record between a user and internship in the database.
     *
     * @param Internship $internship
     * @param User $user
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function attach(Internship $internship, User $user, array $data)
    {
        return DB::transaction(function () use ($internship, $user, $data) {
            $internship
                ->users()
                ->attach(
                    $user->id,
                    [
                        'relationship_type_id' => $data['relationship_type_id'] ?? 2,
                        'comments' => $data['comments'] ?? null,
                    ]
                );

            event(new UserAddedToInternship($internship, $user, $data));

            return $internship;
        });
    }

    /**
     * Update an Internship User relationship record in the database.
     *
     * @param Internship $internship
     * @param User $user
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function update(Internship $internship, User $user, array $data)
    {
        // $internship->loadMissing(
        //         'applicants',
        //         'participants'
        //     );

        return DB::transaction(function () use ($internship, $user, $data) {
            $internship
                ->users()
                ->updateExistingPivot(
                    $user->id,
                    [
                        'relationship_type_id' => $data['relationship_type_id'] ?? 2,
                        'comments' => $data['comments'] ?? null,
                    ]
                );

            event(new InternshipUserRelationshipUpdated($internship, $user, $data));

            return $internship;
        });
    }

    /**
     * Remove a relationship from between an internship and user in the database.
     *
     * @param Internship $internship
     * @param User $user
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function detach(Internship $internship, User $user, array $data)
    {
        return DB::transaction(function () use ($internship, $user, $data) {
            $internship
                ->users()
                ->wherePivot('relationship_type_id', $data['relationship_type_id'])
                ->detach();

            event(new UserRemovedFromInternship($internship, $user, $data));

            return $internship;
        });
    }
}
