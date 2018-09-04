<?php

namespace SCCatalog\Repositories\Backend\Lookup;

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
