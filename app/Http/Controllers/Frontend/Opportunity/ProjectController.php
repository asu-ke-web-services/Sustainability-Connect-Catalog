<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use JavaScript;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Events\Frontend\Opportunity\ProjectCreated;
use SCCatalog\Http\Requests\Frontend\Opportunity\StoreProjectRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\ViewProjectRequest;
use SCCatalog\Repositories\Frontend\Auth\UserRepository;
use SCCatalog\Repositories\Frontend\Lookup\AffiliationRepository;
use SCCatalog\Repositories\Frontend\Lookup\BudgetTypeRepository;
use SCCatalog\Repositories\Frontend\Lookup\CategoryRepository;
use SCCatalog\Repositories\Frontend\Lookup\KeywordRepository;
use SCCatalog\Repositories\Frontend\Lookup\OpportunityStatusRepository;
use SCCatalog\Repositories\Frontend\Lookup\OpportunityReviewStatusRepository;
use SCCatalog\Repositories\Frontend\Opportunity\OpportunityRepository;
use SCCatalog\Repositories\Frontend\Opportunity\ProjectRepository;
use SCCatalog\Repositories\Frontend\Organization\OrganizationRepository;

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
     * Display a listing of the Project.
     *
     * @param ViewProjectRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ViewProjectRequest $request)
    {
        if ( auth()->user() !== null ) {
            $userAccessAffiliations = auth()->user()->accessAffiliations
                ->map(function ($affiliation) {
                    return $affiliation['slug'];
                })->toJson();

            $canViewRestricted = auth()->user()->hasPermissionTo('read restricted opportunity');
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
     * Show the form for creating a new Project.
     *
     * @param ViewProjectRequest $request
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
            ViewProjectRequest $request,
            AffiliationRepository $affiliationRepository,
            BudgetTypeRepository $budgetTypeRepository,
            CategoryRepository $categoryRepository,
            KeywordRepository $keywordRepository,
            OpportunityRepository $opportunityRepository,
            OpportunityStatusRepository $opportunityStatusRepository,
            OpportunityReviewStatusRepository $opportunityReviewStatusRepository,
            OrganizationRepository $organizationRepository,
            UserRepository $userRepository
    )
    {
        return view('frontend.opportunity.project.create')
            ->with('affiliations', $affiliationRepository->where('opportunity_type_id', 1)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('budgetTypes', $budgetTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('opportunities', $opportunityRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', 1)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('opportunityReviewStatuses', $opportunityReviewStatusRepository->where('opportunity_type_id', 1)->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param StoreProjectRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(StoreProjectRequest $request)
    {
        $project = $this->projectRepository->create($request->only(
            'name',
            'public_name',
            'description',
            'listing_start_at',
            'listing_end_at',
            'application_deadline_at',
            'application_deadline_text',
            'opportunity_status_id',
            'opportunity_start_at',
            'opportunity_end_at',
            'organization_id',
            'parent_opportunity_id',
            'supervisor_user_id',
            'opportunity_status_id',
            'opportunityable',
            'affiliations',
            'categories',
            'keywords',
            'addresses'
        ));

//         dd($project);

        // event(new ProjectCreated($project));

        return redirect()->route('admin.opportunity.project.show', $project)
            ->withFlashSuccess(__('Project created successfully'));
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
                'opportunityable',
                'addresses',
                'notes',
                'status',
                'parentOpportunity',
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

        if ( auth()->user() !== null ) {
            $userAccessAffiliations = auth()->user()->accessAffiliations
                ->map(function ($affiliation) {
                    return $affiliation['slug'];
                })->toJson();

            $canViewRestricted = auth()->user()->hasPermissionTo('read restricted opportunity');

            $followedOpportunities = auth()->user()->followedOpportunities
                ->map(function ($opportunity) {
                    return $opportunity['id'];
                })->toArray();

            $isFollowed = in_array($id, $followedOpportunities);

        }

        return view('frontend.opportunity.project.show')
            ->withProject($project)
            ->with('type', 'Project')
            ->with('pageTitle', $project->name)
            ->with('isFollowed', $isFollowed);
    }
}
