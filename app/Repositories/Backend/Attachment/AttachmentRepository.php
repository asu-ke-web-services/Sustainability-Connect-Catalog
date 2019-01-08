<?php

namespace SCCatalog\Repositories\Backend\Attachment;

use SCCatalog\Models\Attachment\Attachment;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class AttachmentRepository
 */
class AttachmentRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Attachment::class;
    }

    /**
     * Create a new file attachment in the database.
     *
     * @param Opportunity $opportunity
     * @param User $user
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {
        	// Create attachment record
            $attachment = Attachment::create(
            	$data->only([
            		'opportunity_id',
            		'user_id',
            		'status',
            		'comment',
            	])
            );

            if (
                $opportunity->users()->attach(
                    $user->id,
                    [
                        'relationship_type_id' => $data['relationship_type_id'] ?? 2,
                        'comment'              => $data['comment'] ?? null,
                    ]
                )
            ) {

                event(new OpportunityUserAdded($opportunity, $user, $data));

                return $opportunity;
            }

            throw new GeneralException(__('exceptions.backend.opportunity.projects.create_error'));
        });
    }

    /**
     * Update an Opportunity User relationship record in the database.
     *
     * @param Opportunity $opportunity
     * @param User $user
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function update(Opportunity $opportunity, User $user, array $data)
    {
        // $opportunity->loadMissing(
        //         'applicants',
        //         'participants'
        //     );

        return DB::transaction(function () use ($opportunity, $user, $data) {

            if (
                $opportunity->applicants()->updateExistingPivot(
                    $user->id,
                    [
                        'relationship_type_id' => $data['relationship_type_id'] ?? null,
                        'comment'              => $data['comment'] ?? null,
                    ]
                )
            ) {
                event(new OpportunityUserRelationshipUpdated($opportunity, $user, $data));

                return $opportunity;
            }

            throw new GeneralException(__('exceptions.backend.opportunity.projects.update_error'));
        });
    }

    /**
     * Remove a user relationship from an opportunity in the database.
     *
     * @param Opportunity $opportunity
     * @param User $user
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function delete(Opportunity $opportunity, User $user, array $data)
    {
        return DB::transaction(function () use ($opportunity, $user, $data) {

            if ( $opportunity
                    ->users()
                    ->wherePivot('relationship_type_id', $data['relationship_type_id'])
                    ->detach()
            ) {

                event(new OpportunityUserRemoved($opportunity, $user, $data));

                return $opportunity;
            }

            throw new GeneralException(__('exceptions.backend.opportunity.projects.create_error'));
        });
    }
}
