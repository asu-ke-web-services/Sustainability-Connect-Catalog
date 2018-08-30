<?php

namespace SCCatalog\Repositories;

use SCCatalog\Models\OrganizationStatus;
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
