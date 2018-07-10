<?php

namespace SCCatalog\Http\Transformers\Api\V1;

use League\Fractal\TransformerAbstract;
use SCCatalog\Models\Opportunity;

/**
 * Class OpportunityTransformer.
 *
 * @package namespace SCCatalog\Transformers;
 */
class OpportunityTransformer extends TransformerAbstract
{
    /**
     * Transform the Opportunity entity.
     *
     * @param \SCCatalog\Models\Opportunity $opportunity
     *
     * @return array
     */
    public function transform(Opportunity $opportunity)
    {
        return [
            'id'                      => (int) $opportunity->id,
            'title'                   => $opportunity->title,
            'altTitle'                => $opportunity->alt_title,
            'slug'                    => $opportunity->slug,
            'startDate'               => $opportunity->start_date,
            'endDate'                 => $opportunity->end_date,
            'listingExpires'          => $opportunity->listing_expires,
            'applicationDeadline'     => $opportunity->application_deadline,
            'applicationDeadlineText' => $opportunity->application_deadline_text,
            'status'                  => $opportunity->status,
            'hidden'                  => $opportunity->hidden,
            'description'             => $opportunity->description,
            'parentOpportunity'       => $opportunity->parentOpportunity,
            'organization'            => $opportunity->organization,
            'addresses'               => $opportunity->addresses,
            'primaryAddress'          => $opportunity->primaryAddress,
            'ownerUser'               => $opportunity->ownerUser,
            'submittingUser'          => $opportunity->submittingUser,
            'createdAt'               => $opportunity->created_at,
            'updatedAt'               => $opportunity->updated_at,
            'deletedAt'               => $opportunity->deleted_at,
            'createdBy'               => $opportunity->created_by,
            'updatedBy'               => $opportunity->updated_by,
            'deletedBy'               => $opportunity->deleted_by
        ];
    }
}
