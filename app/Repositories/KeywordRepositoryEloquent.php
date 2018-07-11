<?php

namespace SCCatalog\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use SCCatalog\Contracts\Repositories\KeywordRepositoryContract;
use SCCatalog\Models\Keyword;

/**
 * Class KeywordRepositoryEloquent
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:46 pm UTC
 *
 * @method Keyword findWithoutFail($id, $columns = ['*'])
 * @method Keyword find($id, $columns = ['*'])
 * @method Keyword first($columns = ['*'])
*/
class KeywordRepositoryEloquent extends BaseRepository implements KeywordRepositoryContract
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
        return Keyword::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return KeywordValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
