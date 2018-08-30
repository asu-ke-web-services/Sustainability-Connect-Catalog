<?php

namespace SCCatalog\Repositories;

use SCCatalog\Models\Category;
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
