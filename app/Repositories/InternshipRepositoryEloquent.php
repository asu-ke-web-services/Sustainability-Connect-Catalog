<?php

namespace SCCatalog\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SCCatalog\Contracts\Repositories\InternshipRepositoryContract;
use SCCatalog\Models\Internship;
use SCCatalog\Validators\InternshipValidator;

/**
 * Class InternshipRepositoryEloquent
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:49 pm UTC
 *
 * @method Internship findWithoutFail($id, $columns = ['*'])
 * @method Internship find($id, $columns = ['*'])
 * @method Internship first($columns = ['*'])
*/
class InternshipRepositoryEloquent extends BaseRepository implements InternshipRepositoryContract
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'compensation',
        'responsibilities',
        'qualifications',
        'application_instructions',
        'comments',
        'program_lead',
        'success_story',
        'library_collection',
        'publish_on',
        'publish_until'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Internship::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return InternshipValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
