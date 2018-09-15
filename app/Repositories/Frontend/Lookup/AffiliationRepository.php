<?php

namespace SCCatalog\Repositories\Frontend\Lookup;

use SCCatalog\Models\Lookup\Affiliation;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class AffiliationRepository
 */
class AffiliationRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Affiliation::class;
    }
}
