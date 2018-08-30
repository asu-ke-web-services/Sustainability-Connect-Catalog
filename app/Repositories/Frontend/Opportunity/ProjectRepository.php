<?php

namespace SCCatalog\Repositories\Frontend\Opportunity;

use SCCatalog\Repositories\Frontend\Opportunity\OpportunityRepository;

/**
 * Class ProjectRepository
 */
class ProjectRepository extends OpportunityRepository
{
    /**
     * Array of one or more where clause parameters.
     *
     * @var array
     */
    protected $wheres = [
        ['opportunityable_type', 'Project'],
    ];

}
