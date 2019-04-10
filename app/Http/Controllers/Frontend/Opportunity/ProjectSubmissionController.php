<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\EditProjectSubmissionRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\StoreProjectSubmissionRequest;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\Auth\Frontend\UserRepository;
use SCCatalog\Repositories\Lookup\AffiliationRepository;
use SCCatalog\Repositories\Lookup\BudgetTypeRepository;
use SCCatalog\Repositories\Lookup\CategoryRepository;
use SCCatalog\Repositories\Lookup\KeywordRepository;
use SCCatalog\Repositories\Lookup\OpportunityStatusRepository;
use SCCatalog\Repositories\Lookup\OpportunityReviewStatusRepository;
use SCCatalog\Repositories\Opportunity\ProjectRepository;
use SCCatalog\Repositories\Organization\OrganizationRepository;

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
        BudgetTypeRepository $budgetTypeRepository,
        CategoryRepository $categoryRepository,
        KeywordRepository $keywordRepository,
        OrganizationRepository $organizationRepository,
        UserRepository $userRepository
    ) {
        return view('frontend.opportunity.project.public.create')
            ->with('budgetTypes', $budgetTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray());
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
            ->withFlashSuccess(__('Project successfully submitted'));
    }

    /**
     * Show the form for updating a Project submission.
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
        BudgetTypeRepository $budgetTypeRepository,
        CategoryRepository $categoryRepository,
        KeywordRepository $keywordRepository,
        OrganizationRepository $organizationRepository,
        UserRepository $userRepository,
        Project $project
    ) {
        $project->loadMissing(
            'addresses',
            'notes',
            'organization',
            'supervisorUser',
            'submittingUser',
            'categories',
            'keywords'
        );

        // dd($project->addresses);

        // if (0 === count($project->addresses)) {
        //     $project->addresses = null;
        // }

        if (0 === count($project->notes)) {
            $project->notes = null;
        }

        if (0 === count($project->categories)) {
            $project->categories = null;
        }

        if (0 === count($project->keywords)) {
            $project->keywords = null;
        }

        return view('frontend.opportunity.project.public.edit')
            ->with('project', $project)
            ->with('budgetTypes', $budgetTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray());
    }

    /**
     * Update a Project in storage.
     *
     * @param StoreProjectSubmissionRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function update(StoreProjectSubmissionRequest $request, Project $project)
    {
        // dd($request->all());

        $project = $this->projectRepository->update($project, $request->all());

        return redirect()->route('frontend.user.dashboard')
            ->withFlashSuccess(__('Proposal successfully submitted'));
    }
}
