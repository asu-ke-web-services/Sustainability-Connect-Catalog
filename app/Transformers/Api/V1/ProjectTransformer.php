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
            'id'                          => (int) $model->id,
            'compensation'                => $model->compensation,
            'responsibilities'            => $model->responsibilities,
            'learning_outcomes'           => $model->learning_outcomes,
            'sustainability_contribution' => $model->sustainability_contribution,
            'qualifications'              => $model->qualifications,
            'application_overview'        => $model->application_overview,
            'implementation_paths'        => $model->implementation_paths,
            'budget_type'                 => $model->budget_type,
            'budget_amount'               => $model->budget_amount,
            'program_lead'                => $model->program_lead,
            'success_story'               => $model->success_story,
            'library_collection'          => $model->library_collection
        ];
    }
}
