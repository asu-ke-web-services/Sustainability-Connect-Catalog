<?php

namespace SCCatalog\Repositories\Frontend\Opportunity;

use Illuminate\Pagination\LengthAwarePaginator;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class InternshipRepository
 */
class InternshipRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Internship::class;
    }

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
            ->active()
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
    public function getInactivePaginated($paged = 25, $orderBy = 'updated_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->active(false)
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }
}
