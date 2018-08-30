<?php

namespace SCCatalog\Repositories;

use SCCatalog\Models\OpportunityStatus;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OpportunityStatusRepository
 */
class OpportunityStatusRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return OpportunityStatus::class;
    }
}
