<?php

namespace SCCatalog\Repositories\Lookup;

use SCCatalog\Models\Lookup\Keyword;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class KeywordRepository
 */
class KeywordRepository extends BaseRepository
{
    /**
     * Array of one or more ORDER BY column/value pairs.
     *
     * @var array
     */
    protected $orderBys = [
        ['column' => 'name', 'direction' => 'asc'],
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Keyword::class;
    }
}
