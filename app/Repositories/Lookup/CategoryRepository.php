<?php

namespace SCCatalog\Repositories\Lookup;

use SCCatalog\Models\Lookup\Category;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class CategoryRepository
 */
class CategoryRepository extends BaseRepository
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
        return Category::class;
    }
}
