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
            'id'                       => (int) $model->id,
            'compensation'             => $model->compensation,
            'responsibilities'         => $model->responsibilities,
            'qualifications'           => $model->qualifications,
            'application_instructions' => $model->application_instructions,
            'comments'                 => $model->comments,
            'program_lead'             => $model->program_lead,
            'success_story'            => $model->success_story,
            'library_collection'       => $model->library_collection,
            'publish_on'               => $model->publish_on,
            'publish_until'            => $model->publish_until
        ];
    }
}
