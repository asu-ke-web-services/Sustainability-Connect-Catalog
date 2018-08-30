<?php

namespace SCCatalog\Repositories\Backend\Opportunity;

use SCCatalog\Repositories\Backend\Opportunity\OpportunityRepository;

/**
 * Class InternshipRepository
 */
class InternshipRepository extends OpportunityRepository
{
    /**
     * Array of one or more where clause parameters.
     *
     * @var array
     */
    protected $wheres = [
        ['opportunityable_type', 'Internship'],
    ];

}
