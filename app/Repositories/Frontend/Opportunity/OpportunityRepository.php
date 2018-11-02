<?php

namespace SCCatalog\Repositories\Frontend\Opportunity;

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

    /**
     * Array of one or more ORDER BY column/value pairs.
     *
     * @var array
     */
    // protected $orderBys = [
    //     ['application_deadline_at', 'desc'],
    //     ['name', 'asc'],
    // ];

}
