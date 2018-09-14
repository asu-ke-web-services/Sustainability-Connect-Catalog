<?php

namespace SCCatalog\Repositories\Backend\Lookup;

use SCCatalog\Models\Lookup\OpportunityReviewStatus;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OpportunityReviewStatusRepository
 */
class OpportunityReviewStatusRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return OpportunityReviewStatus::class;
    }
}
