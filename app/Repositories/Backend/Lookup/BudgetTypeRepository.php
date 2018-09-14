<?php

namespace SCCatalog\Repositories\Backend\Lookup;

use SCCatalog\Models\Lookup\BudgetType;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class BudgetTypeRepository
 */
class BudgetTypeRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return BudgetType::class;
    }
}
