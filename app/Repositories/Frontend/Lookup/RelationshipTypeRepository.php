<?php

namespace SCCatalog\Repositories;

use SCCatalog\Models\RelationshipType;
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
