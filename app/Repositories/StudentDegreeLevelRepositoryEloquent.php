<?php

namespace SCCatalog\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use SCCatalog\Contracts\Repository\AddressRepositoryContract;
use SCCatalog\Models\StudentDegreeLevel;

/**
 * Class StudentDegreeLevelRepository
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:46 pm UTC
 *
 * @method StudentDegreeLevel findWithoutFail($id, $columns = ['*'])
 * @method StudentDegreeLevel find($id, $columns = ['*'])
 * @method StudentDegreeLevel first($columns = ['*'])
*/
class StudentDegreeLevelRepository extends BaseRepository implements AddressRepositoryContract
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
        return StudentDegreeLevel::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return StudentDegreeLevelValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
