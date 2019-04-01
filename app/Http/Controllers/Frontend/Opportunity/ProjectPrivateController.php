<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use JavaScript;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Events\Frontend\Opportunity\ProjectCreated;
use SCCatalog\Http\Requests\Frontend\Opportunity\EditFullProjectRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\StoreFullProjectRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\ViewProjectRequest;
use SCCatalog\Repositories\Frontend\Auth\UserRepository;
use SCCatalog\Repositories\Frontend\Lookup\AffiliationRepository;
use SCCatalog\Repositories\Frontend\Lookup\BudgetTypeRepository;
use SCCatalog\Repositories\Frontend\Lookup\CategoryRepository;
use SCCatalog\Repositories\Frontend\Lookup\KeywordRepository;
use SCCatalog\Repositories\Frontend\Lookup\OpportunityStatusRepository;
use SCCatalog\Repositories\Frontend\Lookup\OpportunityReviewStatusRepository;
use SCCatalog\Repositories\Frontend\Opportunity\ProjectRepository;
use SCCatalog\Repositories\Frontend\Organization\OrganizationRepository;
use SCCatalog\Models\Opportunity\Project;

/**
 * Class ProjectPrivateController.
 */
class ProjectPrivateController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * ProjectPrivateController constructor.
     *
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Display the specified Project.
     *
     * @param ViewProjectRequest $request
     * @param Project            $user
     *
     * @return \Illuminate\View\View
     */
    public function show(ViewProjectRequest $request, $id)
    {
        $project = $this->projectRepository
            ->with([
                'addresses',
                'notes',
                'status',
                'organization',
                'supervisorUser',
                'submittingUser',
                'affiliations',
                'categories',
                'keywords',
                'followers',
                'applicants',
            ])
            ->getById($id);

        $attachments = $project->getMedia();


        return view('frontend.opportunity.project.show_private')
            ->withProject($project)
            ->withAttachments($attachments)
            ->with('pageTitle', $project->name);
    }

    /**
     * Display the print-version of the specified Project.
     *
     * @param ViewProjectRequest $request
     * @param Project          $project
     *
     * @return \Illuminate\View\View
     */
    public function print(ViewProjectRequest $request, Project $project)
    {
        $project->loadMissing(
            'addresses',
            'notes',
            'status',
            'organization',
            'supervisorUser',
            'submittingUser',
            'affiliations',
            'categories',
            'keywords',
            'users',
            'createdByUser',
            'updatedByUser'
        );

        $attachments = $project->getMedia();

        return view('frontend.opportunity.project.print')
            ->withProject($project)
            ->withAttachments($attachments);
    }

    /**
     * Show the form for creating a new, full Project.
     *
     * @param EditFullProjectRequest $request
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
        EditFullProjectRequest $request,
        AffiliationRepository $affiliationRepository,
        BudgetTypeRepository $budgetTypeRepository,
        CategoryRepository $categoryRepository,
        KeywordRepository $keywordRepository,
        OpportunityStatusRepository $opportunityStatusRepository,
        OpportunityReviewStatusRepository $opportunityReviewStatusRepository,
        OrganizationRepository $organizationRepository,
        UserRepository $userRepository
    ) {
        return view('frontend.opportunity.project.create_full')
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
     * @param StoreFullProjectRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(StoreFullProjectRequest $request)
    {
        $project = $this->projectRepository->create($request->all());

        return redirect()->route('frontend.user.dashboard')
            ->withFlashSuccess(__('Proposal successfully submitted'));
    }

    /**
     * Show the form for updating a full, new Project.
     *
     * @param EditFullProjectRequest $request
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
        EditFullProjectRequest $request,
        AffiliationRepository $affiliationRepository,
        BudgetTypeRepository $budgetTypeRepository,
        CategoryRepository $categoryRepository,
        KeywordRepository $keywordRepository,
        OpportunityStatusRepository $opportunityStatusRepository,
        OpportunityReviewStatusRepository $opportunityReviewStatusRepository,
        OrganizationRepository $organizationRepository,
        UserRepository $userRepository,
        Project $project
    ) {
        return view('frontend.opportunity.project.edit_full')
            ->with('project', $project)
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
     * Update a Project in storage.
     *
     * @param StoreFullProjectRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function update(StoreFullProjectRequest $request, Project $project)
    {
        $project = $this->projectRepository->update($project, $request->all());

        return redirect()->route('frontend.user.dashboard')
            ->withFlashSuccess(__('Proposal successfully submitted'));
    }
}
