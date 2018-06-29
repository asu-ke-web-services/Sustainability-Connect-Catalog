<?php

namespace SCCatalog\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use SCCatalog\Contracts\Repository\AddressRepositoryContract;
use SCCatalog\Models\OrganizationStatus;

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

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return OrganizationStatusValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
