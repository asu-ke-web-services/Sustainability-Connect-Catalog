<?php

namespace SCCatalog\Repositories\Lookup;

use SCCatalog\Models\Lookup\RelationshipType;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class RelationshipTypeRepository
 */
class RelationshipTypeRepository extends BaseRepository
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
        return RelationshipType::class;
    }
}
