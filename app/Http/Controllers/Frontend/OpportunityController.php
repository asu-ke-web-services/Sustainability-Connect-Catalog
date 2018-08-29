<?php

namespace SCCatalog\Http\Controllers\Frontend;

use Flash;
use Illuminate\Http\Request;
use Response;
use SCCatalog\Contracts\Repositories\OpportunityRepositoryContract as OpportunityRepository;
use SCCatalog\Validators\OpportunityValidator;
use SCCatalog\Models\Category;
use SCCatalog\Models\Keyword;
use SCCatalog\Models\Opportunity;
use SCCatalog\Models\Organization;
use SCCatalog\Models\User;

/**
 * Class OpportunityController.
 *
 * @package namespace SCCatalog\Http\Controllers;
 */
class OpportunityController extends Controller
{
    /**
     * @var  OpportunityRepository
     */
    private $repository;

    /**
     * @var OpportunityValidator
     */
    protected $validator;

    /**
     * OpportunityController constructor.
     *
     * @param OpportunityRepository $repository
     * @param OpportunityValidator $validator
     */
    public function __construct(OpportunityRepository $repository, OpportunityValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Duplicate opportunity.
     *
     * @param int $id
     *
     * @return Response
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
