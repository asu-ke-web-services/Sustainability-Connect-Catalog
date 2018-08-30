<?php

namespace SCCatalog\Repositories\Frontend\Opportunity;

use SCCatalog\Repositories\Frontend\Opportunity\OpportunityRepository;

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
