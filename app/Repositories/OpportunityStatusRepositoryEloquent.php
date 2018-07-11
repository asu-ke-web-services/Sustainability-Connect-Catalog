<?php

namespace SCCatalog\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use SCCatalog\Contracts\Repositories\OpportunityStatusRepositoryContract;
use SCCatalog\Models\OpportunityStatus;

/**
 * Class OpportunityStatusRepositoryEloquent
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:46 pm UTC
 *
 * @method OpportunityStatus findWithoutFail($id, $columns = ['*'])
 * @method OpportunityStatus find($id, $columns = ['*'])
 * @method OpportunityStatus first($columns = ['*'])
*/
class OpportunityStatusRepositoryEloquent extends BaseRepository implements OpportunityStatusRepositoryContract
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
