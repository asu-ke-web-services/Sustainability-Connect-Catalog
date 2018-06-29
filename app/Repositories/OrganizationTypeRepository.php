<?php

namespace SCCatalog\Repositories;

use SCCatalog\Contracts\Repository\AddressRepositoryContract;
use SCCatalog\Models\OrganizationType;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OrganizationTypeRepository
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:46 pm UTC
 *
 * @method OrganizationType findWithoutFail($id, $columns = ['*'])
 * @method OrganizationType find($id, $columns = ['*'])
 * @method OrganizationType first($columns = ['*'])
*/
class OrganizationTypeRepository extends BaseRepository implements AddressRepositoryContract
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order',
        'name',
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OrganizationType::class;
    }
}
