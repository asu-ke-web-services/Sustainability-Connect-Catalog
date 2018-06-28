<?php

namespace SCCatalog\Repositories;

use SCCatalog\Models\Organization;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrganizationRepository
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:29 pm UTC
 *
 * @method Organization findWithoutFail($id, $columns = ['*'])
 * @method Organization find($id, $columns = ['*'])
 * @method Organization first($columns = ['*'])
*/
class OrganizationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'organization_type_id',
        'organization_status_id',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Organization::class;
    }
}
