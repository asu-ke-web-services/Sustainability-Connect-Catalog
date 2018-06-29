<?php

namespace SCCatalog\Transformers\Api\V1;

use League\Fractal\TransformerAbstract;
use SCCatalog\Models\Project;

/**
 * Class ProjectTransformer.
 *
 * @package namespace SCCatalog\Transformers;
 */
class ProjectTransformer extends TransformerAbstract
{
    /**
     * Transform the Project entity.
     *
     * @param \SCCatalog\Models\Project $model
     *
     * @return array
     */
    public function transform(Project $model)
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
