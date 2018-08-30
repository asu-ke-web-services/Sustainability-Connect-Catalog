<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\ArchiveOpportunityRequest;
use SCCatalog\Http\Requests\DuplicateOpportunityRequest;
use SCCatalog\Models\Category;
use SCCatalog\Models\Keyword;
use SCCatalog\Models\Opportunity;
use SCCatalog\Models\Organization;
use SCCatalog\Models\User;
use SCCatalog\Repositories\Frontend\Opportunity\OpportunityRepository;

/**
 * Class OpportunityController.
 */
class OpportunityController extends Controller
{
    /**
     * @var  OpportunityRepository
     */
    private $repository;

    /**
     * OpportunityController constructor.
     *
     * @param OpportunityRepository $repository
     */
    public function __construct(OpportunityRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Duplicate opportunity.
     *
     * @param int $id
     * @param DuplicateOpportunityRequest $request
     *
     * @return
     */
    public function clone($id, DuplicateOpportunityRequest $request)
    {
        $user = Auth::user();
        $opportunity = $this->repository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        DuplicateOpportunity::dispatch($opportunity, $user);

        Flash::success('Successfully duplicated opportunity.');

        return redirect(route('projects.index'));
    }

    /**
     * Archive opportunity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function archive($id, ArchiveOpportunityRequest $request)
    {
        $user = Auth::user();
        $opportunity = $this->repository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        ArchiveOpportunity::dispatch($opportunity, $user);

        Flash::success('Successfully archived opportunity.');

        return redirect(route('projects.index'));
    }

}
