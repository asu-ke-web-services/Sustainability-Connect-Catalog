<?php

namespace SCCatalog\Repositories\Backend\Lookup;

use SCCatalog\Models\Lookup\RelationshipType;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class RelationshipTypeRepository
 */
class RelationshipTypeRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return RelationshipType::class;
    }
}
