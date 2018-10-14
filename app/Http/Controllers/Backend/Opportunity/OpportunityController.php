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

    /**
     * Clone opportunity.
     *
     * @param OpportunityRequest $request
     * @param int $opportunityId
     * @param int $userId
     * @param int $relationshipId
     * @return
     */
    public function clone(CloneOpportunityRequest $request, Opportunity $opportunity)
    {
        // $opportunity = $this->opportunityRepository->getById($opportunityId);

        $opportunity = $this->participantRepository->clone($opportunity);

        event(new OpportunityCloned(
            $opportunity
        ));

        return redirect()->route('admin.backend.opportunity.cloned')
            ->withFlashSuccess('Opportunity cloned successfully');
    }

}
