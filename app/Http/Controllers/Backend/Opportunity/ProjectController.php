<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Events\Backend\Opportunity\OpportunityDeleted;
use SCCatalog\Http\Requests\Backend\Opportunity\CreateProjectRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\DeleteProjectRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\UpdateProjectRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\ManageProjectRequest;
use SCCatalog\Models\Opportunity\Opportunity;
use SCCatalog\Repositories\Backend\Auth\UserRepository;
use SCCatalog\Repositories\Backend\Lookup\AffiliationRepository;
use SCCatalog\Repositories\Backend\Lookup\BudgetTypeRepository;
use SCCatalog\Repositories\Backend\Lookup\CategoryRepository;
use SCCatalog\Repositories\Backend\Lookup\KeywordRepository;
use SCCatalog\Repositories\Backend\Lookup\OpportunityStatusRepository;
use SCCatalog\Repositories\Backend\Lookup\OpportunityReviewStatusRepository;
use SCCatalog\Repositories\Backend\Opportunity\OpportunityRepository;
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
        return view('backend.opportunity.project.index')
            ->with('projects', $this->projectRepository->getActivePaginated(25, 'application_deadline', 'asc'));
    }

    /**
     * Show the form for creating a new Project.
     *
     * @param CreateProjectRequest $request
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
            CreateProjectRequest $request,
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
        return view('backend.opportunity.project.create')
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
     * @param CreateProjectRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(CreateProjectRequest $request)
    {
        $project = $this->projectRepository->create($request->only(
            'name',
            'public_name',
            'description',
            'listing_starts',
            'listing_ends',
            'application_deadline',
            'opportunity_status_id',
            'start_date',
            'end_date',
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

        return redirect()->route('admin.opportunity.project.show', $project)
            ->withFlashSuccess(__('Project created successfully'));
    }

    /**
     * Display the specified Project.
     *
     * @param ManageProjectRequest $request
     * @param Opportunity          $project
     *
     * @return \Illuminate\View\View
     */
    public function show(ManageProjectRequest $request, Opportunity $project)
    {
        $project->loadMissing(
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
     * @param OpportunityRepository $opportunityRepository
     * @param OpportunityStatusRepository $opportunityStatusRepository
     * @param OpportunityReviewStatusRepository $opportunityReviewStatusRepository
     * @param OrganizationRepository $organizationRepository
     * @param UserRepository $userRepository
     * @param Opportunity $project
     *
     * @return \Illuminate\View\View
     */
    public function edit(
        UpdateProjectRequest $request,
        AffiliationRepository $affiliationRepository,
        BudgetTypeRepository $budgetTypeRepository,
        CategoryRepository $categoryRepository,
        KeywordRepository $keywordRepository,
        OpportunityRepository $opportunityRepository,
        OpportunityStatusRepository $opportunityStatusRepository,
        OpportunityReviewStatusRepository $opportunityReviewStatusRepository,
        OrganizationRepository $organizationRepository,
        UserRepository $userRepository,
        Opportunity $project
    )
    {
        $project->loadMissing(
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
            'users'
        );

        return view('backend.opportunity.project.edit')
            ->with('project', $project)
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
     * Update the specified Project in storage.
     *
     * @param UpdateProjectRequest $request
     *
     * @param Opportunity $project
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function update(UpdateProjectRequest $request, Opportunity $project)
    {
        $project = $this->projectRepository->update($project, $request->only(
            'name',
            'public_name',
            'description',
            'listing_starts',
            'listing_ends',
            'application_deadline',
            'start_date',
            'end_date',
            'opportunity_status_id',
            'organization_id',
            'parent_opportunity_id',
            'supervisor_user_id',
            'opportunityable',
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
     * @param Opportunity $project
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function destroy(DeleteProjectRequest $request, Opportunity $project)
    {
        $this->projectRepository->deleteById($project->id);

        return redirect()->route('admin.opportunity.project.index')
            ->withFlashSuccess('Project deleted successfully');
    }


    /**
     * @param ManageProjectRequest $request
     *
     * @return mixed
     */
    public function getDeactivated(ManageProjectRequest $request)
    {
        return view('backend.opportunity.project.deactivated')
            ->withProjects($this->projectRepository->getInactivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageProjectRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageProjectRequest $request)
    {
        return view('backend.opportunity.project.deleted')
            ->withProjects($this->projectRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageProjectRequest $request
     *
     * @return mixed
     */
    public function getNeedsReview(ManageProjectRequest $request)
    {
        return view('backend.opportunity.project.review')
            ->withProjects($this->projectRepository->getReviewPaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageProjectRequest $request
     * @param int                  $deletedProjectId
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(ManageProjectRequest $request, $deletedProjectId)
    {
        $this->projectRepository->forceDelete($deletedProjectId);

        return redirect()->route('admin.opportunity.project.deleted')->withFlashSuccess(__('alerts.backend.opportunity.projects.deleted_permanently'));
    }

    /**
     * @param ManageProjectRequest $request
     * @param int                  $deletedProjectId
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     */
    public function restore(ManageProjectRequest $request, $deletedProjectId)
    {
        $this->projectRepository->restore($deletedProjectId);

        return redirect()->route('admin.opportunity.project.index')->withFlashSuccess(__('alerts.backend.opportunity.projects.restored'));
    }
}
