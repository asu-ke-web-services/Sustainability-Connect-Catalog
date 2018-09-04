<?php

namespace SCCatalog\Repositories\Backend\Lookup;

use SCCatalog\Models\Lookup\OrganizationType;
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
