<?php

namespace SCCatalog\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use SCCatalog\Contracts\Repositories\RelationshipTypeRepositoryContract;
use SCCatalog\Models\RelationshipType;

/**
 * Class RelationshipTypeRepositoryEloquent
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:46 pm UTC
 *
 * @method RelationshipType findWithoutFail($id, $columns = ['*'])
 * @method RelationshipType find($id, $columns = ['*'])
 * @method RelationshipType first($columns = ['*'])
*/
class RelationshipTypeRepositoryEloquent extends BaseRepository implements RelationshipTypeRepositoryContract
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
        return RelationshipType::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return RelationshipTypeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
