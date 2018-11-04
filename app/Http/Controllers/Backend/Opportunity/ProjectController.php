<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use JavaScript;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Events\Backend\Opportunity\ProjectDeleted;
use SCCatalog\Http\Requests\Backend\Opportunity\CreateProjectRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\DeleteProjectRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\UpdateProjectRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\ManageProjectRequest;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\Backend\Auth\UserRepository;
use SCCatalog\Repositories\Backend\Lookup\AffiliationRepository;
use SCCatalog\Repositories\Backend\Lookup\BudgetTypeRepository;
use SCCatalog\Repositories\Backend\Lookup\CategoryRepository;
use SCCatalog\Repositories\Backend\Lookup\KeywordRepository;
use SCCatalog\Repositories\Backend\Lookup\OpportunityStatusRepository;
use SCCatalog\Repositories\Backend\Lookup\OpportunityReviewStatusRepository;
use SCCatalog\Repositories\Backend\Opportunity\ProjectRepository;
use SCCatalog\Repositories\Backend\Organization\OrganizationRepository;

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
     * @param ManageProjectRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageProjectRequest $request)
    {
        $userAccessAffiliations = auth()->user()->accessAffiliations
            ->map(function ($affiliation) {
                return $affiliation['slug'];
            })->toJson();

        $canViewRestricted = auth()->user()->hasPermissionTo('read restricted project');

        JavaScript::put([
            'userAccessAffiliations' => $userAccessAffiliations ?? null,
            'canViewRestricted' => $canViewRestricted ?? false
        ]);

        return view('backend.opportunity.project.index')
            ->with('projects', $this->projectRepository->getActivePaginated(25, 'updated_at', 'desc'));
    }

    /**
     * Show the form for creating a new Project.
     *
     * @param CreateProjectRequest $request
     * @param BudgetTypeRepository $budgetTypeRepository
     * @param AffiliationRepository $affiliationRepository
     * @param CategoryRepository $categoryRepository
     * @param KeywordRepository $keywordRepository
     * @param ProjectRepository $projectRepository
     * @param OpportunityStatusRepository $opportunityStatusRepository
     * @param OpportunityReviewStatusRepository $opportunityReviewStatusRepository
     * @param OrganizationRepository $organizationRepository
     * @param UserRepository $userRepository
     *
     * @return \Illuminate\View\View
     */
    public function create(
            CreateProjectRequest $request,
            AffiliationRepository $affiliationRepository,
            BudgetTypeRepository $budgetTypeRepository,
            CategoryRepository $categoryRepository,
            KeywordRepository $keywordRepository,
            OpportunityStatusRepository $opportunityStatusRepository,
            OpportunityReviewStatusRepository $opportunityReviewStatusRepository,
            OrganizationRepository $organizationRepository,
            UserRepository $userRepository
    )
    {
        return view('backend.opportunity.project.create')
            ->with('affiliations', $affiliationRepository->where('opportunity_type_id', '!=', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('budgetTypes', $budgetTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', '!=', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('opportunityReviewStatuses', $opportunityReviewStatusRepository->where('opportunity_type_id', '!=', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param CreateProjectRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(CreateProjectRequest $request)
    {
        $project = $this->projectRepository->create($request->only(
            'name',
            'description',
            'listing_start_at',
            'listing_end_at',
            'application_deadline_at',
            'application_deadline_text',
            'opportunity_status_id',
            'opportunity_start_at',
            'opportunity_end_at',
            'organization_id',
            // 'parent_opportunity_id',
            'supervisor_user_id',
            'opportunity_status_id',
            'affiliations',
            'categories',
            'keywords',
            'addresses'
        ));

        return redirect()->route('admin.opportunity.project.show', $project)
            ->withFlashSuccess(__('Project created successfully'));
    }

    /**
     * Display the specified Project.
     *
     * @param ManageProjectRequest $request
     * @param Project          $project
     *
     * @return \Illuminate\View\View
     */
    public function show(ManageProjectRequest $request, Project $project)
    {
        $project->loadMissing(
            'addresses',
            'notes',
            'status',
            // 'parentOpportunity',
            'organization',
            'supervisorUser',
            'submittingUser',
            'affiliations',
            'categories',
            'keywords',
            'users'
        );

        return view('backend.opportunity.project.show')
            ->withProject($project);
    }

    /**
     * Show the form for editing the specified Project.
     *
     * @param UpdateProjectRequest $request
     * @param AffiliationRepository $affiliationRepository
     * @param BudgetTypeRepository $budgetTypeRepository
     * @param CategoryRepository $categoryRepository
     * @param KeywordRepository $keywordRepository
     * @param ProjectRepository $projectRepository
     * @param OpportunityStatusRepository $opportunityStatusRepository
     * @param OpportunityReviewStatusRepository $opportunityReviewStatusRepository
     * @param OrganizationRepository $organizationRepository
     * @param UserRepository $userRepository
     * @param Project $project
     *
     * @return \Illuminate\View\View
     */
    public function edit(
        UpdateProjectRequest $request,
        AffiliationRepository $affiliationRepository,
        BudgetTypeRepository $budgetTypeRepository,
        CategoryRepository $categoryRepository,
        KeywordRepository $keywordRepository,
        OpportunityStatusRepository $opportunityStatusRepository,
        OpportunityReviewStatusRepository $opportunityReviewStatusRepository,
        OrganizationRepository $organizationRepository,
        UserRepository $userRepository,
        Project $project
    )
    {
        $project->loadMissing(
            'addresses',
            'notes',
            'status',
            // 'parentOpportunity',
            'organization',
            'supervisorUser',
            'submittingUser',
            'affiliations',
            'categories',
            'keywords',
            'users'
        );

        return view('backend.opportunity.project.edit')
            ->with('project', $project)
            ->with('affiliations', $affiliationRepository->where('opportunity_type_id', '!=', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('budgetTypes', $budgetTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', '!=', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('opportunityReviewStatuses', $opportunityReviewStatusRepository->where('opportunity_type_id', '!=', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * Update the specified Project in storage.
     *
     * @param UpdateProjectRequest $request
     *
     * @param Project $project
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project = $this->projectRepository->update($project, $request->only(
            'name',
            'description',
            'listing_start_at',
            'listing_end_at',
            'application_deadline_at',
            'application_deadline_text',
            'opportunity_start_at',
            'opportunity_end_at',
            'opportunity_status_id',
            'organization_id',
            // 'parent_opportunity_id',
            'supervisor_user_id',
            'affiliations',
            'categories',
            'keywords',
            'addresses'
        ));

        return redirect()->route('admin.opportunity.project.show', $project)
            ->withFlashSuccess(__('Project updated successfully'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param DeleteProjectRequest $request
     * @param Project $project
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function destroy(DeleteProjectRequest $request, Project $project)
    {
        $this->projectRepository->deleteById($project->id);

        return redirect()->route('admin.opportunity.project.index')
            ->withFlashSuccess('Project deleted successfully');
    }

    /**
     * Clone project.
     *
     * @param CloneProjectRequest $request
     * @param Project $project
     * @return
     * @throws \Throwable
     */
    public function clone(CloneProjectRequest $request, Project $project)
    {
        // $project = $this->projectRepository->getById($projectId);

        $project = $this->projectRepository->clone($project);

        event(new ProjectCloned($project));

        return redirect()->route('admin.backend.opportunity.project.show', $project)
            ->withFlashSuccess('Project cloned successfully');
    }

}
