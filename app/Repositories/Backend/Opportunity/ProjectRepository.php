<?php

namespace SCCatalog\Repositories\Backend\Opportunity;

use SCCatalog\Repositories\Backend\Opportunity\OpportunityRepository;

/**
 * Class ProjectRepository
 */
class ProjectRepository extends OpportunityRepository
{
    /**
     * Array of one or more where clause parameters.
     *
     * @var array
     */
    // protected $wheres = [
    //     ['opportunityable_type', 'Project'],
    // ];


    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    // public function getActivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    // {
    //     return $this->model
    //         // ->with('roles', 'permissions', 'providers')
    //         ->active()
    //         ->orderBy($orderBy, $sort)
    //         ->paginate($paged);
    // }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    // public function getInactivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    // {
    //     return $this->model
    //         // ->with('roles', 'permissions', 'providers')
    //         ->active(false)
    //         ->orderBy($orderBy, $sort)
    //         ->paginate($paged);
    // }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    // public function getClosedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    // {
    //     return $this->model
    //         // ->with('roles', 'permissions', 'providers')
    //         ->closed()
    //         ->orderBy($orderBy, $sort)
    //         ->paginate($paged);
    // }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    // public function getDeletedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    // {
    //     return $this->model
    //         ->with('roles', 'permissions', 'providers')
    //         ->onlyTrashed()
    //         ->orderBy($orderBy, $sort)
    //         ->paginate($paged);
    // }


}
