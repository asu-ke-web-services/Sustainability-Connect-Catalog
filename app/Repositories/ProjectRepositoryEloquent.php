<?php

namespace SCCatalog\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SCCatalog\Contracts\Repositories\ProjectRepositoryContract;
use SCCatalog\Models\Project;
use SCCatalog\Validators\ProjectValidator;

/**
 * Class ProjectRepositoryEloquent
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:48 pm UTC
 *
 * @method Project findWithoutFail($id, $columns = ['*'])
 * @method Project find($id, $columns = ['*'])
 * @method Project first($columns = ['*'])
*/
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepositoryContract
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'compensation',
        'responsibilities',
        'learning_outcomes',
        'sustainability_contribution',
        'qualifications',
        'application_overview',
        'implementation_paths',
        'budget_type',
        'budget_amount',
        'program_lead',
        'success_story',
        'library_collection'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Project::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProjectValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
