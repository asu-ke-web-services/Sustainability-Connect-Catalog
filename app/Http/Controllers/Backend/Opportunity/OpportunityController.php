<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Events\Backend\Opportunity\OpportunityCloned;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Opportunity\CloneOpportunityRequest;
use SCCatalog\Models\Opportunity\Opportunity;
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

    /**
     * Clone opportunity.
     *
     * @param CloneOpportunityRequest $request
     * @param Opportunity $opportunity
     * @return
     * @throws \Throwable
     */
    public function clone(CloneOpportunityRequest $request, Opportunity $opportunity)
    {
        // $opportunity = $this->opportunityRepository->getById($opportunityId);

        $opportunity = $this->opportunityRepository->clone($opportunity);

        event(new OpportunityCloned($opportunity));

        return redirect()->route('admin.backend.opportunity.cloned')
            ->withFlashSuccess('Opportunity cloned successfully');
    }

}
