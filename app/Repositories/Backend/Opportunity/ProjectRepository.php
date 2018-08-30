<?php

namespace SCCatalog\Repositories\Backend\Opportunity;

use SCCatalog\Repositories\Backend\Opportunity\OpportunityRepository;

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
