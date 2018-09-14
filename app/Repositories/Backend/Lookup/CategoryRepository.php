<?php

namespace SCCatalog\Repositories\Backend\Lookup;

use SCCatalog\Models\Lookup\Category;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class CategoryRepository
 */
class CategoryRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Category::class;
    }
}
