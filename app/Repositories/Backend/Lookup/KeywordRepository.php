<?php

namespace SCCatalog\Repositories\Backend\Lookup;

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
