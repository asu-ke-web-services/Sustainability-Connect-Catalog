<?php

namespace SCCatalog\Repositories;

use SCCatalog\Models\OrganizationType;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OrganizationTypeRepository
 */
class OrganizationTypeRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return OrganizationType::class;
    }
}
