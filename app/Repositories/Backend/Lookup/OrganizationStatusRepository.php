<?php

namespace SCCatalog\Repositories\Backend\Lookup;

use SCCatalog\Models\Lookup\OrganizationStatus;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OrganizationStatusRepository
 */
class OrganizationStatusRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return OrganizationStatus::class;
    }
}
