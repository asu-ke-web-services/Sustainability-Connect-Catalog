<?php

namespace SCCatalog\Repositories\Backend;

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

    /**
     * Array of related models to eager load.
     *
     * @var array
     */
    protected $with = [
        'organization_type_id',
        'organization_status_id',
        'name',
    ];

    /**
     * Array of one or more ORDER BY column/value pairs.
     *
     * @var array
     */
    // protected $orderBys = [
    //     ['name', 'asc'],
    // ];

}
