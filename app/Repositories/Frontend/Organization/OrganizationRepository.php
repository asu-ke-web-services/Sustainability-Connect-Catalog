<?php

namespace SCCatalog\Repositories;

use SCCatalog\Models\Organization;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OrganizationRepository
 */
class OrganizationRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Organization::class;
    }
}
