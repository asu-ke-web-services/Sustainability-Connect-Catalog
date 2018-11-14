<?php

namespace SCCatalog\Repositories\Backend\Organization;

use SCCatalog\Models\Organization\Organization;
use SCCatalog\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class OrganizationRepository
 */
class OrganizationRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Organization::class;
    }

    /**
     * @param int $paged
     * @param string $search
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getActivePaginated($paged = 25, $search = '', $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->search($search)
            ->active()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int $paged
     * @param string $search
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getAllPaginated($paged = 25, $search = '', $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->search($search)
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int $paged
     * @param string $search
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getInactivePaginated($paged = 25, $search = '', $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->search($search)
            ->active()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int $paged
     * @param string $search
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getDeletedPaginated($paged = 25, $search = '', $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->search($search)
            ->onlyTrashed()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

}
