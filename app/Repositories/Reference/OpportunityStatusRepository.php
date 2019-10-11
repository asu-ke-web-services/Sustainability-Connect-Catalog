<?php

namespace SCCatalog\Repositories\Reference;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Reference\OpportunityStatus;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OpportunityStatusRepository
 */
class OpportunityStatusRepository extends BaseRepository
{
    /**
     * OpportunityStatusRepository constructor.
     *
     * @param  OpportunityStatus  $model
     */
    public function __construct(OpportunityStatus $model)
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
     * @return OpportunityStatus
     */
    public function create(array $data) : OpportunityStatus
    {
        return DB::transaction(function () use ($data) {
            $status = $this->model::create($data);

            if ($status) {
                // event(new OpportunityStatusCreated($status));

                return $status;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param OpportunityStatus  $status
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return OpportunityStatus
     */
    public function update(OpportunityStatus $status, array $data) : OpportunityStatus
    {
        return DB::transaction(function () use ($status, $data) {
            if ($status->update($data)) {
                // event(new OpportunityStatusUpdated($status));

                return $status;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }
}
