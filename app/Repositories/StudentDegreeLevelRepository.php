<?php

namespace SCCatalog\Repositories;

use SCCatalog\Contracts\Repository\AddressRepositoryContract;
use SCCatalog\Models\StudentDegreeLevel;
use SCCatalog\Repositories\BaseRepository;

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
}
