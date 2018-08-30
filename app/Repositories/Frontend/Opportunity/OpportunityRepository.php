<?php

namespace SCCatalog\Repositories;

use SCCatalog\Models\Opportunity;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OpportunityRepository
 */
class OpportunityRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Opportunity::class;
    }
}
