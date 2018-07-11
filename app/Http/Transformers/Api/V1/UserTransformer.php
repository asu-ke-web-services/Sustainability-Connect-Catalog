<?php

namespace SCCatalog\Transformers\Api\V1;

use League\Fractal\TransformerAbstract;
use SCCatalog\Models\User;

/**
 * Class UserTransformer.
 *
 * @package namespace SCCatalog\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * Transform the User entity.
     *
     * @param \SCCatalog\Models\User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
