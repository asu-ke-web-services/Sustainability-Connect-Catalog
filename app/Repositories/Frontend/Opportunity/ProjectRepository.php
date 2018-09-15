<?php

namespace SCCatalog\Repositories\Frontend\Opportunity;

use Illuminate\Pagination\LengthAwarePaginator;
use SCCatalog\Repositories\Frontend\Opportunity\OpportunityRepository;

/**
 * Class ProjectRepository
 */
class ProjectRepository extends OpportunityRepository
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
            ->active()
            ->filterByType('Project')
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
            ->filterByType('Project')
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

}
