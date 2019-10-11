<?php

namespace SCCatalog\Repositories\Reference;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Reference\OpportunityReviewStatus;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OpportunityReviewStatusRepository
 */
class OpportunityReviewStatusRepository extends BaseRepository
{
    /**
     * OpportunityReviewStatusRepository constructor.
     *
     * @param  OpportunityReviewStatus  $model
     */
    public function __construct(OpportunityReviewStatus $model)
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
     * @return OpportunityReviewStatus
     */
    public function create(array $data) : OpportunityReviewStatus
    {
        return DB::transaction(function () use ($data) {
            $status = $this->model::create($data);

            if ($status) {
                // event(new OpportunityReviewStatusCreated($status));

                return $status;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param OpportunityReviewStatus  $status
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return OpportunityReviewStatus
     */
    public function update(OpportunityReviewStatus $status, array $data) : OpportunityReviewStatus
    {
        return DB::transaction(function () use ($status, $data) {
            if ($status->update($data)) {
                // event(new OpportunityReviewStatusUpdated($status));

                return $status;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }
}
