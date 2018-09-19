<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Repositories\Backend\Opportunity\OpportunityRepository;

/**
 * Class OpportunityController.
 */
class OpportunityController extends Controller
{
    /**
     * @var OpportunityRepository
     */
    private $opportunityRepository;

    /**
     * OpportunityController constructor.
     *
     * @param OpportunityRepository $opportunityRepository
     */
    public function __construct(OpportunityRepository $opportunityRepository)
    {
        $this->opportunityRepository = $opportunityRepository;
    }
}
