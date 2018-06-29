<?php

namespace SCCatalog\Presenters\Api\V1;

use SCCatalog\Transformers\OpportunityTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OpportunityPresenter.
 *
 * @package namespace SCCatalog\Presenters;
 */
class OpportunityPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OpportunityTransformer();
    }
}
