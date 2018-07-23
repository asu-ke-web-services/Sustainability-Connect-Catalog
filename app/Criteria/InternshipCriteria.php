<?php

namespace SCCatalog\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class InternshipCriteria.
 *
 * @package namespace SCCatalog\Criteria;
 */
class InternshipCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('opportunityable_type', 'Internship');
    }
}
