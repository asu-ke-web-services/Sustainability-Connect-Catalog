<?php

namespace SCCatalog\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use SCCatalog\Contracts\Repositories\OrganizationTypeRepositoryContract;
use SCCatalog\Models\OrganizationType;

/**
 * Class OrganizationTypeRepositoryEloquent
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:46 pm UTC
 *
 * @method OrganizationType findWithoutFail($id, $columns = ['*'])
 * @method OrganizationType find($id, $columns = ['*'])
 * @method OrganizationType first($columns = ['*'])
*/
class OrganizationTypeRepositoryEloquent extends BaseRepository implements OrganizationTypeRepositoryContract
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

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return OrganizationTypeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
