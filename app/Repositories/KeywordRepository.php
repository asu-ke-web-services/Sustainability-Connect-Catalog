<?php

namespace SCCatalog\Repositories;

use SCCatalog\Contracts\Repository\AddressRepositoryContract;
use SCCatalog\Models\Keyword;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class KeywordRepository
 * @package SCCatalog\Repositories
 * @version June 20, 2018, 11:46 pm UTC
 *
 * @method Keyword findWithoutFail($id, $columns = ['*'])
 * @method Keyword find($id, $columns = ['*'])
 * @method Keyword first($columns = ['*'])
*/
class KeywordRepository extends BaseRepository implements AddressRepositoryContract
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
}
