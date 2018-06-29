<?php

namespace SCCatalog\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use SCCatalog\Contracts\Repository\AddressRepositoryContract;
use SCCatalog\Models\OpportunityStatus;

/**
 * Class OpportunityStatusRepository
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:46 pm UTC
 *
 * @method OpportunityStatus findWithoutFail($id, $columns = ['*'])
 * @method OpportunityStatus find($id, $columns = ['*'])
 * @method OpportunityStatus first($columns = ['*'])
*/
class OpportunityStatusRepository extends BaseRepository implements AddressRepositoryContract
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
        return OpportunityStatus::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return OpportunityStatusValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
