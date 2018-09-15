<?php

namespace SCCatalog\Repositories\Frontend\Lookup;

use SCCatalog\Models\Lookup\Keyword;
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
