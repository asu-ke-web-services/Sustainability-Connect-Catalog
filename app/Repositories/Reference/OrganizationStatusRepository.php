<?php

namespace SCCatalog\Repositories\Reference;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Reference\OrganizationStatus;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OrganizationStatusRepository
 */
class OrganizationStatusRepository extends BaseRepository
{
    /**
     * OrganizationStatusRepository constructor.
     *
     * @param  OrganizationStatus  $model
     */
    public function __construct(OrganizationStatus $model)
    {
        $this->model = $model;
    }

    /**
     * Array of one or more ORDER BY column/value pairs.
     *
     * @var array
     */
    protected $orderBys = [
        ['column' => 'order', 'direction' => 'asc'],
    ];

    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return OrganizationStatus
     */
    public function create(array $data) : OrganizationStatus
    {
        return DB::transaction(function () use ($data) {
            $status = $this->model::create($data);

            if ($status) {
                // event(new OrganizationStatusCreated($status));

                return $status;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param OrganizationStatus  $status
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return OrganizationStatus
     */
    public function update(OrganizationStatus $status, array $data) : OrganizationStatus
    {
        return DB::transaction(function () use ($status, $data) {
            if ($status->update($data)) {
                // event(new OrganizationStatusUpdated($status));

                return $status;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }
}
