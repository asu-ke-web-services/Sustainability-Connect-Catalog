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
     * @param \SCCatalog\Models\Internship $model
     *
     * @return array
     */
    public function transform(Internship $model)
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
