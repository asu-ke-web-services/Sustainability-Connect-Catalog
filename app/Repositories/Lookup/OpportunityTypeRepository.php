<?php

namespace SCCatalog\Repositories\Lookup;

use SCCatalog\Models\Lookup\OpportunityType;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OpportunityTypeRepository
 */
class OpportunityTypeRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return OpportunityType::class;
    }
}
