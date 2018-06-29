<?php

namespace SCCatalog\Presenters\Api\V1;

use SCCatalog\Transformers\OrganizationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OrganizationPresenter.
 *
 * @package namespace SCCatalog\Presenters;
 */
class OrganizationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OrganizationTransformer();
    }
}
