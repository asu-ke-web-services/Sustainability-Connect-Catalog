<?php

namespace SCCatalog\Repositories\Reference;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Reference\BudgetType;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class BudgetTypeRepository
 */
class BudgetTypeRepository extends BaseRepository
{
    /**
     * BudgetTypeRepository constructor.
     *
     * @param  BudgetType  $model
     */
    public function __construct(BudgetType $model)
    {
        $this->model = $model;
    }

    /**
     * Array of one or more ORDER BY column/value pairs.
     *
     * @var array
     */
    protected $orderBys = [
        ['column' => 'name', 'direction' => 'asc'],
    ];

    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return BudgetType
     */
    public function create(array $data) : BudgetType
    {
        return DB::transaction(function () use ($data) {
            $budgetType = $this->model::create($data);

            if ($budgetType) {
                // event(new BudgetTypeCreated($budgetType));

                return $budgetType;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param BudgetType  $budgetType
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return BudgetType
     */
    public function update(BudgetType $budgetType, array $data) : BudgetType
    {
        return DB::transaction(function () use ($budgetType, $data) {
            if ($budgetType->update($data)) {
                // event(new BudgetTypeUpdated($budgetType));

                return $budgetType;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }
}
