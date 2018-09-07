<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Events\Backend\Opportunity\ProjectCreated;
use SCCatalog\Events\Backend\Opportunity\ProjectUpdated;
use SCCatalog\Events\Backend\Opportunity\ProjectDeleted;
use SCCatalog\Http\Requests\Backend\Opportunity\ProjectRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\ManageProjectRequest;
use SCCatalog\Repositories\Backend\Auth\UserRepository;
use SCCatalog\Repositories\Backend\Lookup\BudgetTypeRepository;
use SCCatalog\Repositories\Backend\Lookup\CategoryRepository;
use SCCatalog\Repositories\Backend\Lookup\KeywordRepository;
use SCCatalog\Repositories\Backend\Lookup\OpportunityStatusRepository;
use SCCatalog\Repositories\Backend\Lookup\OpportunityReviewStatusRepository;
use SCCatalog\Repositories\Backend\Opportunity\OpportunityRepository;
use SCCatalog\Repositories\Backend\Opportunity\ProjectRepository;
use SCCatalog\Repositories\Backend\OrganizationRepository;

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
        // dd($this->projectRepository->paginate(25));

        return view('backend.opportunity.project.index')
            ->with('projects', $this->projectRepository->paginate(25));
    }

    /**
     * Show the form for creating a new Project.
     *
     * @param ManageProjectRequest        $request
     * @param BudgetTypeRepository        $budgetTypeRepository
     * @param CategoryRepository          $categoryRepository
     * @param KeywordRepository           $keywordRepository
     * @param OpportunityRepository       $opportunityRepository
     * @param OpportunityStatusRepository $opportunityStatusRepository
     * @param OrganizationRepository      $organizationRepository
     * @param UserRepository              $userRepository
     *
     * @return \Illuminate\View\View
     */
    public function create(
            ManageProjectRequest $request,
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
     * @param ProjectRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(ProjectRequest $request)
    {
        $project = $this->projectRepository->create($request->only(
            'name',
            'public_name',
            'description',
            'listing_starts',
            'listing_ends',
            'application_deadline',
            'application_deadline_text',
            'start_date',
            'end_date',
            'organization_id',
            'parent_opportunity_id',
            'supervisor_user_id'
            // 'addresses',
            // 'status',
            // 'affiliations',
            // 'categories',
            // 'keywords'
        ));

        dd($project);

        // event(new ProjectCreated($project));

        return redirect()->route('admin.opportunity.project.index')
            ->withFlashSuccess(__('Project created successfully'));
    }

    /**
     * Display the specified Project.
     *
     * @param ManageProjectRequest $request
     * @param Project            $user
     *
     * @return \Illuminate\View\View
     */
    public function show(ManageProjectRequest $request, $id)
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
                'categories',
                'keywords',
                'followers',
                'applicants',
            ])
            ->getById($id);

        return view('backend.opportunity.project.show')
            ->withProject($project);
    }

    /**
     * Show the form for editing the specified Project.
     *
     * @param ManageProjectRequest        $request
     * @param BudgetTypeRepository        $budgetTypeRepository
     * @param CategoryRepository          $categoryRepository
     * @param KeywordRepository           $keywordRepository
     * @param OpportunityRepository       $opportunityRepository
     * @param OpportunityStatusRepository $opportunityStatusRepository
     * @param OrganizationRepository      $organizationRepository
     * @param UserRepository              $userRepository
     * @param  int                        $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(
            ManageProjectRequest $request,
            BudgetTypeRepository $budgetTypeRepository,
            CategoryRepository $categoryRepository,
            KeywordRepository $keywordRepository,
            OpportunityRepository $opportunityRepository,
            OpportunityStatusRepository $opportunityStatusRepository,
            OrganizationRepository $organizationRepository,
            UserRepository $userRepository,
            $id
    )
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
                'categories',
                'keywords',
                'followers',
                'applicants',
            ])
            ->getById($id);

        return view('backend.opportunity.project.edit')
            ->with('project', $project)
            ->with('budgetTypes', $budgetTypeRepository->get(['id', 'name']))
            ->with('categories', $categoryRepository->get(['id', 'name']))
            ->with('keywords', $keywordRepository->get(['id', 'name']))
            ->with('opportunities', $opportunityRepository->get(['id', 'name']))
            ->with('organizations', $organizationRepository->get(['id', 'name']))
            ->with('users', $userRepository->get(['id', 'name']))
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', 1)->get(['id', 'name']));
    }

    /**
     * Update the specified Project in storage.
     *
     * @param  int                 $id
     * @param ProjectRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function update(ProjectRequest $request, $id)
    {
        $project = $this->projectRepository->update($request->only(
            'name',
            'public_name',
            'description',
            'listing_starts',
            'listing_ends',
            'application_deadline',
            'application_deadline_text',
            'start_date',
            'end_date',
            'organization_id',
            'parent_opportunity_id',
            'supervisor_user_id'
            // 'addresses',
            // 'status',
            // 'affiliations',
            // 'categories',
            // 'keywords'
        ));

        // event(new ProjectUpdated($project));

        return redirect()->route('admin.opportunity.project.index')
            ->withFlashSuccess(__('Project updated successfully'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param ManageProjectRequest $request
     * @param  int                 $id
     *
     * @return \Illuminate\View\View
     * @throws \Exception
     */
    public function destroy(ManageProjectRequest $request, $id)
    {
        $project = $this->projectRepository->getById($id);
        $this->projectRepository->deleteById($id);

        // event(new ProjectDeleted($project));

        return redirect()->route('admin.opportunity.project.index')
            ->withFlashSuccess('Project deleted successfully');
    }
}
