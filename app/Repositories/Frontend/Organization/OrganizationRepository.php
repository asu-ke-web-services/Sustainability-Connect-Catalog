<?php

namespace SCCatalog\Repositories\Frontend\Organization;

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

    /**
     * Array of related models to eager load.
     *
     * @var array
     */
    protected $with = [
        'status',
        'type',
    ];
}
