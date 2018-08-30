<?php

namespace SCCatalog\Repositories;

use SCCatalog\Models\Keyword;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class KeywordRepository
 */
class KeywordRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Keyword::class;
    }
}
