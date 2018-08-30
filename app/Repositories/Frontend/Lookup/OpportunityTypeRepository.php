<?php

namespace SCCatalog\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use SCCatalog\Contracts\Repositories\OpportunityTypeRepositoryContract;
use SCCatalog\Models\OpportunityType;
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
