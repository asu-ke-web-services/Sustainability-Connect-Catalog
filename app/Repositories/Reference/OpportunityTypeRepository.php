<?php

namespace SCCatalog\Repositories\Reference;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Reference\OpportunityType;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OpportunityTypeRepository
 */
class OpportunityTypeRepository extends BaseRepository
{
    /**
     * OpportunityTypeRepository constructor.
     *
     * @param  OpportunityType  $model
     */
    public function __construct(OpportunityType $model)
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
     * @return OpportunityType
     */
    public function create(array $data) : OpportunityType
    {
        return DB::transaction(function () use ($data) {
            $type = $this->model::create($data);

            if ($type) {
                // event(new OpportunityTypeCreated($type));

                return $type;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param OpportunityType  $type
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return OpportunityType
     */
    public function update(OpportunityType $type, array $data) : OpportunityType
    {
        return DB::transaction(function () use ($type, $data) {
            if ($type->update($data)) {
                // event(new OpportunityTypeUpdated($type));

                return $type;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }
}
