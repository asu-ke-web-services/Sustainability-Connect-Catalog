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
 * Class ProjectController.
 */
class ProjectController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * ProjectController constructor.
     *
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Display a listing of the Projects.
     *
     * @param ViewProjectRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ViewProjectRequest $request)
    {
        if (auth()->user() !== null) {
            $userAccessAffiliations = auth()->user()->accessAffiliations
                ->map(function ($affiliation) {
                    return $affiliation['slug'];
                })->toJson();

            $canViewRestricted = auth()->user()->hasPermissionTo('read all projects');
        }

        JavaScript::put([
            'userAccessAffiliations' => $userAccessAffiliations ?? null,
            'canViewRestricted' => $canViewRestricted ?? false
        ]);

        return view('frontend.opportunity.project.index')
            ->with('type', 'Project')
            ->with('pageTitle', 'Projects');
    }

    /**
     * Display a listing of Completed Projects.
     *
     * @param ViewProjectRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function completed(ViewProjectRequest $request)
    {
        if (auth()->user() !== null) {
            $userAccessAffiliations = auth()->user()->accessAffiliations
                ->map(function ($affiliation) {
                    return $affiliation['slug'];
                })->toJson();

            $canViewRestricted = auth()->user()->hasPermissionTo('read all projects');
        }

        JavaScript::put([
            'userAccessAffiliations' => $userAccessAffiliations ?? null,
            'canViewRestricted' => $canViewRestricted ?? false
        ]);

        return view('frontend.opportunity.project.completed')
            ->with('type', 'Project')
            ->with('pageTitle', 'Past Projects');
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

        $userAccessAffiliations = false;
        $canViewRestricted = false;
        $isFollowed = false;
        $isApplicationSubmitted = false;

        if (auth()->user() !== null) {
            $userAccessAffiliations = auth()->user()->accessAffiliations
                ->map(function ($affiliation) {
                    return $affiliation['slug'];
                })->toJson();

            $canViewRestricted = auth()->user()->hasPermissionTo('read all internships');

            $followedProjects = auth()->user()->followedProjects
                ->map(function ($project) {
                    return $project['id'];
                })->toArray();

            $isFollowed = in_array($id, $followedProjects);

            $appliedProjects = auth()->user()->projectApplications
                ->map(function ($project) {
                    return $project['id'];
                })->toArray();

            $isApplicationSubmitted = in_array($id, $appliedProjects);
        }

        return view('frontend.opportunity.project.show')
            ->withProject($project)
            ->with('type', 'Project')
            ->with('pageTitle', $project->name)
            ->with('userAccessAffiliations', $userAccessAffiliations)
            ->with('canViewRestricted', $canViewRestricted)
            ->with('isFollowed', $isFollowed)
            ->with('isApplicationSubmitted', $isApplicationSubmitted);
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
