<?php

namespace SCCatalog\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SCCatalog\Contracts\Repository\OrganizationRepositoryContract;
use SCCatalog\Models\Organization;
use SCCatalog\Validators\OrganizationValidator;

/**
 * Class OrganizationRepository
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:29 pm UTC
 *
 * @method Organization findWithoutFail($id, $columns = ['*'])
 * @method Organization find($id, $columns = ['*'])
 * @method Organization first($columns = ['*'])
*/
class OrganizationRepository extends BaseRepository implements AddressRepositoryContract
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

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return OrganizationValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
