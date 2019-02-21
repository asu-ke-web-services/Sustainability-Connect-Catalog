<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use JavaScript;
use SCCatalog\Events\Backend\Opportunity\ProjectCloned;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Opportunity\CloneProjectRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\StoreProjectRequest;
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

        $canViewRestricted = auth()->user()->hasPermissionTo('read all projects');

        JavaScript::put([
            'userAccessAffiliations' => $userAccessAffiliations ?? null,
            'canViewRestricted' => $canViewRestricted ?? false
        ]);

        return view('backend.opportunity.project.all')
            ->with('projects', $this->projectRepository->getAllPaginated(10000, 'created_at', 'desc'))
            ->with('defaultOrderBy', 'created_at')
            ->with('defaultSort', 'desc');
    }

    /**
     * Show the form for creating a new Project.
     *
     * @param StoreProjectRequest $request
     * @param BudgetTypeRepository $budgetTypeRepository
     * @param AffiliationRepository $affiliationRepository
     * @param CategoryRepository $categoryRepository
     * @param KeywordRepository $keywordRepository
     * @param OpportunityStatusRepository $opportunityStatusRepository
     * @param OpportunityReviewStatusRepository $opportunityReviewStatusRepository
     * @param OrganizationRepository $organizationRepository
     * @param UserRepository $userRepository
     *
     * @return \Illuminate\View\View
     */
    public function create(
            StoreProjectRequest $request,
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
            ->with('affiliations', $affiliationRepository->whereIn('opportunity_type_id', [1,2])->get(['id', 'name'])->pluck('name', 'id')->toArray())
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
     * @param StoreProjectRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(StoreProjectRequest $request)
    {
        $project = $this->projectRepository->create($request->all());

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
            'organization',
            'supervisorUser',
            'submittingUser',
            'affiliations',
            'categories',
            'keywords',
            'users'
        );

        $attachments = $project->getMedia();

        return view('backend.opportunity.project.show')
            ->withProject($project)
            ->withAttachments($attachments);
    }

    /**
     * Display the print-version of the specified Project.
     *
     * @param ManageProjectRequest $request
     * @param Project          $project
     *
     * @return \Illuminate\View\View
     */
    public function print(ManageProjectRequest $request, Project $project)
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
            'users'
        );

        $attachments = $project->getMedia();

        return view('backend.opportunity.project.print')
            ->withProject($project)
            ->withAttachments($attachments);
    }

    /**
     * Show the form for editing the specified Project.
     *
     * @param UpdateProjectRequest $request
     * @param AffiliationRepository $affiliationRepository
     * @param BudgetTypeRepository $budgetTypeRepository
     * @param CategoryRepository $categoryRepository
     * @param KeywordRepository $keywordRepository
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
            'organization',
            'supervisorUser',
            'submittingUser',
            'affiliations',
            'categories',
            'keywords',
            'users'
        );

        // dd($opportunityStatusRepository->where('opportunity_type_id', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray());

        // dd($project->affiliations->pluck('id')->toArray());

        return view('backend.opportunity.project.edit')
            ->with('project', $project)
            ->with('affiliations', $affiliationRepository->whereIn('opportunity_type_id', [1,2])->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('budgetTypes', $budgetTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('opportunityReviewStatuses', $opportunityReviewStatusRepository->where('opportunity_type_id', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray());
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
        $project = $this->projectRepository->update($project, $request->all());

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

        $clone = $this->projectRepository->clone($project);

        return redirect()->route('admin.backend.opportunity.project.show', $clone)
            ->withFlashSuccess('Project cloned successfully');
    }

}
