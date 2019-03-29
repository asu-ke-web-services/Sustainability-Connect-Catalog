<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\EditProjectSubmissionRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\StoreProjectSubmissionRequest;
use SCCatalog\Repositories\Frontend\Auth\UserRepository;
use SCCatalog\Repositories\Frontend\Lookup\AffiliationRepository;
use SCCatalog\Repositories\Frontend\Lookup\BudgetTypeRepository;
use SCCatalog\Repositories\Frontend\Lookup\CategoryRepository;
use SCCatalog\Repositories\Frontend\Lookup\KeywordRepository;
use SCCatalog\Repositories\Frontend\Lookup\OpportunityStatusRepository;
use SCCatalog\Repositories\Frontend\Lookup\OpportunityReviewStatusRepository;
use SCCatalog\Repositories\Frontend\Opportunity\ProjectRepository;
use SCCatalog\Repositories\Frontend\Organization\OrganizationRepository;

/**
 * Class ProjectSubmissionController.
 */
class ProjectSubmissionController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * ProjectSubmissionController constructor.
     *
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Show the form for creating a new Project.
     *
     * @param EditProjectSubmissionRequest $request
     * @param BudgetTypeRepository $budgetTypeRepository
     * @param AffiliationRepository $affiliationRepository
     * @param CategoryRepository $categoryRepository
     * @param KeywordRepository $keywordRepository
     * @param OpportunityRepository $opportunityRepository
     * @param OpportunityStatusRepository $opportunityStatusRepository
     * @param OpportunityReviewStatusRepository $opportunityReviewStatusRepository
     * @param OrganizationRepository $organizationRepository
     * @param UserRepository $userRepository
     *
     * @return \Illuminate\View\View
     */
    public function create(
        EditProjectSubmissionRequest $request,
        AffiliationRepository $affiliationRepository,
        BudgetTypeRepository $budgetTypeRepository,
        CategoryRepository $categoryRepository,
        KeywordRepository $keywordRepository,
        OpportunityStatusRepository $opportunityStatusRepository,
        OpportunityReviewStatusRepository $opportunityReviewStatusRepository,
        OrganizationRepository $organizationRepository,
        UserRepository $userRepository
    ) {
        return view('frontend.opportunity.project.create_basic')
            ->with('affiliations', $affiliationRepository->whereIn('opportunity_type_id', [1, 2])->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('budgetTypes', $budgetTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('opportunityReviewStatuses', $opportunityReviewStatusRepository->where('opportunity_type_id', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param StoreProjectSubmissionRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(StoreProjectSubmissionRequest $request)
    {
        $project = $this->projectRepository->create($request->all());

        return redirect()->route('frontend.user.dashboard')
            ->withFlashSuccess(__('Project Proposal successfully submitted'));
    }

    /**
     * Show the form for creating a new Project.
     *
     * @param EditProjectSubmissionRequest $request
     * @param BudgetTypeRepository $budgetTypeRepository
     * @param AffiliationRepository $affiliationRepository
     * @param CategoryRepository $categoryRepository
     * @param KeywordRepository $keywordRepository
     * @param OpportunityRepository $opportunityRepository
     * @param OpportunityStatusRepository $opportunityStatusRepository
     * @param OpportunityReviewStatusRepository $opportunityReviewStatusRepository
     * @param OrganizationRepository $organizationRepository
     * @param UserRepository $userRepository
     *
     * @return \Illuminate\View\View
     */
    public function edit(
        EditProjectSubmissionRequest $request,
        AffiliationRepository $affiliationRepository,
        BudgetTypeRepository $budgetTypeRepository,
        CategoryRepository $categoryRepository,
        KeywordRepository $keywordRepository,
        OpportunityStatusRepository $opportunityStatusRepository,
        OpportunityReviewStatusRepository $opportunityReviewStatusRepository,
        OrganizationRepository $organizationRepository,
        UserRepository $userRepository
    ) {
        return view('frontend.opportunity.project.edit_basic')
            ->with('affiliations', $affiliationRepository->whereIn('opportunity_type_id', [1, 2])->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('budgetTypes', $budgetTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            // ->with('opportunities', $opportunityRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('opportunityReviewStatuses', $opportunityReviewStatusRepository->where('opportunity_type_id', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param StoreProjectSubmissionRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function update(StoreProjectSubmissionRequest $request)
    {
        $project = $this->projectRepository->create($request->all());

        return redirect()->route('frontend.user.dashboard', $project)
            ->withFlashSuccess(__('Proposal successfully submitted'));
    }
}
