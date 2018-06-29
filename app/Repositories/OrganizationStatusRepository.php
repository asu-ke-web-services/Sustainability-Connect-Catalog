<?php

namespace SCCatalog\Repositories;

use SCCatalog\Contracts\Repository\AddressRepositoryContract;
use SCCatalog\Models\OrganizationStatus;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OrganizationStatusRepository
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:46 pm UTC
 *
 * @method OrganizationStatus findWithoutFail($id, $columns = ['*'])
 * @method OrganizationStatus find($id, $columns = ['*'])
 * @method OrganizationStatus first($columns = ['*'])
*/
class OrganizationStatusRepository extends BaseRepository implements AddressRepositoryContract
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
        return OrganizationStatus::class;
    }
}
