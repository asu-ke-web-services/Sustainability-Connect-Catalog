<?php

namespace SCCatalog\Repositories\Lookup;

use SCCatalog\Models\Lookup\OrganizationType;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OrganizationTypeRepository
 */
class OrganizationTypeRepository extends BaseRepository
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
        return OrganizationType::class;
    }
}
