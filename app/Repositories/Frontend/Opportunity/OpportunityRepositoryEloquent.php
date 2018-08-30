<?php

namespace SCCatalog\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SCCatalog\Contracts\Repositories\OpportunityRepositoryContract;
use SCCatalog\Models\Opportunity;
use SCCatalog\Validators\OpportunityValidator;

/**
 * Class OpportunityRepositoryEloquent
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:46 pm UTC
 *
 * @method Opportunity findWithoutFail($id, $columns = ['*'])
 * @method Opportunity find($id, $columns = ['*'])
 * @method Opportunity first($columns = ['*'])
*/
class OpportunityRepositoryEloquent extends BaseRepository implements OpportunityRepositoryContract
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Opportunity::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return OpportunityValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
