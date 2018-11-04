<?php

namespace SCCatalog\Repositories\Backend\Organization;

use SCCatalog\Models\Organization\Organization;
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
