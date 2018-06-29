<?php

namespace SCCatalog\Transformers\Api\V1;

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
     * @param \SCCatalog\Models\Opportunity $model
     *
     * @return array
     */
    public function transform(Opportunity $model)
    {
        return [
            'id'                    => (int) $model->id,
            'title'                 => $model->title,
            'alt_title'             => $model->alt_title,
            'slug'                  => $model->slug,
            'listing_expires'       => $model->listing_expires,
            'application_deadline'  => $model->application_deadline,
            'opportunity_status_id' => $model->opportunity_status_id,
            'hidden'                => $model->hidden,
            'summary'               => $model->summary,
            'description'           => $model->description,
            'parent_opportunity_id' => $model->parent_opportunity_id,
            'organization_id'       => $model->organization_id,
            'owner_user_id'         => $model->owner_user_id,
            'submitting_user_id'    => $model->submitting_user_id,
            'created_at'            => $model->created_at,
            'updated_at'            => $model->updated_at,
            'deleted_at'            => $model->deleted_at,
            'created_by'            => $model->created_by,
            'updated_by'            => $model->updated_by,
            'deleted_by'            => $model->deleted_by
        ];
    }
}
