<?php

namespace SCCatalog\Repositories\Backend\Opportunity;

use SCCatalog\Models\Opportunity\Opportunity;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OpportunityRepository
 */
class OpportunityRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Opportunity::class;
    }

    /**
     * Array of related models to eager load.
     *
     * @var array
     */
    protected $with = [
        'opportunityable',
        'addresses',
        'notes',
        'status',
        'parentOpportunity',
        'organization',
        'supervisorUser',
        'affiliations',
        'categories',
        'keywords',
        'followers',
        'applicants',
    ];
}
