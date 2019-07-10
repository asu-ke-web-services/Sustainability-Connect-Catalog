<?php

namespace SCCatalog\Repositories\Lookup;

use SCCatalog\Models\Lookup\OpportunityStatus;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OpportunityStatusRepository
 */
class OpportunityStatusRepository extends BaseRepository
{
    /**
     * Array of one or more ORDER BY column/value pairs.
     *
     * @var array
     */
    protected $orderBys = [
        ['column' => 'order', 'direction' => 'asc'],
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OpportunityStatus::class;
    }
}
