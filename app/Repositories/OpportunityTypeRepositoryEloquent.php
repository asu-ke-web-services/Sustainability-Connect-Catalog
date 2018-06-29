<?php

namespace SCCatalog\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use SCCatalog\Contracts\Repository\AddressRepositoryContract;
use SCCatalog\Models\OpportunityType;

/**
 * Class OpportunityTypeRepository
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:46 pm UTC
 *
 * @method OpportunityType findWithoutFail($id, $columns = ['*'])
 * @method OpportunityType find($id, $columns = ['*'])
 * @method OpportunityType first($columns = ['*'])
*/
class OpportunityTypeRepository extends BaseRepository implements AddressRepositoryContract
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
        return OpportunityType::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return OpportunityTypeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
