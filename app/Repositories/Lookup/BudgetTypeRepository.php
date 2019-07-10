<?php

namespace SCCatalog\Repositories\Lookup;

use SCCatalog\Models\Lookup\BudgetType;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class BudgetTypeRepository
 */
class BudgetTypeRepository extends BaseRepository
{
    /**
     * Array of one or more ORDER BY column/value pairs.
     *
     * @var array
     */
    protected $orderBys = [
        ['column' => 'name', 'direction' => 'asc'],
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BudgetType::class;
    }
}
