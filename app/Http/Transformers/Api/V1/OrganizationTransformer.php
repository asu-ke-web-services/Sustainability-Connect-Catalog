<?php

namespace SCCatalog\Transformers\Api\V1;

use League\Fractal\TransformerAbstract;
use SCCatalog\Models\Organization;

/**
 * Class OrganizationTransformer.
 *
 * @package namespace SCCatalog\Transformers;
 */
class OrganizationTransformer extends TransformerAbstract
{
    /**
     * Transform the Organization entity.
     *
     * @param \SCCatalog\Models\Organization $model
     *
     * @return array
     */
    public function transform(Organization $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
