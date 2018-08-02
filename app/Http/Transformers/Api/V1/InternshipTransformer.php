<?php

namespace SCCatalog\Transformers\Api\V1;

use League\Fractal\TransformerAbstract;
use SCCatalog\Models\Internship;

/**
 * Class InternshipTransformer.
 *
 * @package namespace SCCatalog\Transformers;
 */
class InternshipTransformer extends TransformerAbstract
{
    /**
     * Transform the Internship entity.
     *
     * @param \SCCatalog\Models\Internship $internship
     *
     * @return array
     */
    public function transform(Internship $internship)
    {
        return [
            'id'                      => (int) $internship->id,
            'name'                    => $internship->opportunity->name,
            'publicName'              => $internship->opportunity->public_name,
            'slug'                    => $internship->opportunity->slug,
            'startDate'               => $internship->opportunity->start_date,
            'endDate'                 => $internship->opportunity->end_date,
            'listingExpires'          => $internship->opportunity->listing_expires,
            'applicationDeadline'     => $internship->opportunity->application_deadline,
            'applicationDeadlineText' => $internship->opportunity->application_deadline_text,
            'status'                  => $internship->opportunity->status,
            'is_hidden'               => $internship->opportunity->hidden,
            'description'             => $internship->opportunity->description,
            'parentOpportunity'       => $internship->opportunity->parentOpportunity,
            'organization'            => $internship->opportunity->organization,
            'addresses'               => $internship->opportunity->addresses,
            'primaryAddress'          => $internship->opportunity->primaryAddress,
            'supervisorUser'          => $internship->opportunity->supervisorUser,
            'submittingUser'          => $internship->opportunity->submittingUser,
            'compensation'            => $internship->compensation,
            'responsibilities'        => $internship->responsibilities,
            'qualifications'          => $internship->qualifications,
            'applicationInstructions' => $internship->application_instructions,
            'comments'                => $internship->comments,
            'programLead'             => $internship->program_lead,
            'successStory'            => $internship->success_story,
            'libraryCollection'       => $internship->library_collection,
            'publishOn'               => $internship->publish_on,
            'publishUntil'            => $internship->publish_until,
            'createdAt'               => $internship->opportunity->created_at,
            'updatedAt'               => $internship->opportunity->updated_at,
            'deletedAt'               => $internship->opportunity->deleted_at,
            'createdBy'               => $internship->opportunity->created_by,
            'updatedBy'               => $internship->opportunity->updated_by,
            'deletedBy'               => $internship->opportunity->deleted_by
        ];
    }
}
