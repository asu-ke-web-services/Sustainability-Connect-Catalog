<?php

namespace SCCatalog\Repositories\Frontend\Opportunity;

use Illuminate\Pagination\LengthAwarePaginator;
use SCCatalog\Repositories\Frontend\Opportunity\OpportunityRepository;

/**
 * Class InternshipRepository
 */
class InternshipRepository extends OpportunityRepository
{
    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getActivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->with('roles', 'permissions', 'providers')
            // ->active()
            ->filterByType('Internship')
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getClosedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->with('roles', 'permissions', 'providers')
            ->active(false)
            ->filterByType('Internship')
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

}
