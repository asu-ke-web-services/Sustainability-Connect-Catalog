<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Opportunity\CreateProjectRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\UpdateProjectRequest;
use SCCatalog\Models\Lookup\Category;
use SCCatalog\Models\Lookup\Keyword;
use SCCatalog\Models\Lookup\BudgetType;
use SCCatalog\Models\Opportunity\Opportunity;
use SCCatalog\Models\Lookup\OpportunityStatus;
use SCCatalog\Models\Organization;
use SCCatalog\Models\Auth\User;
use SCCatalog\Repositories\Backend\Opportunity\ProjectRepository;

class ProjectController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $repository;

    /**
     * ProjectController constructor.
     *
     * @param ProjectRepository $repository
     */
    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the Project.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // view React SearchApp
        return view('projects.search');
    }

    /**
     * Show the form for creating a new Project.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories       = Category::select('id', 'name')->get()->toArray();
        $keywords         = Keyword::select('id', 'name')->get()->toArray();
        $budgetTypes      = BudgetType::select('id', 'name')->get()->toArray();
        $allOpportunities = Opportunity::select('id', 'name')->get()->toArray();
        $allOrganizations = Organization::select('id', 'name')->get()->toArray();
        $users            = User::select('id', 'name')->get()->toArray();
        $statuses         = OpportunityStatus::select('id', 'name')->where('opportunity_type_id', 1)->get()->toArray();

        return view('projects.create', [
            'type' => 'Project',
            'pageTitle' => 'New Project',
            'categories' => $categories,
            'keywords' => $keywords,
            'budgetTypes' => $budgetTypes,
            'allOrganizations' => $allOrganizations,
            'allOpportunities' => $allOpportunities,
            'statuses' => $statuses,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param CreateProjectRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->only([
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
            'supervisor_user_id',
            'addresses',
            'status',
            'affiliations',
            'categories',
            'keywords',
        ]);

        $input['opportunityable'] =

        dd($input);

        $opportunity = $this->repository->create($input);

        Flash::success('Project saved successfully.');

        event(new OpportunityCreatedEvent($opportunity));

        return redirect(route('projects/{$opportunity}'));
    }

    /**
     * Display the specified Project.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // $this->repository->pushCriteria(ProjectCriteria::class);
        $opportunity = $this->repository
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
            ->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        return view('projects.show', [
            'type' => $opportunity->opportunityable_type,
            'pageTitle' => $opportunity->name,
            'opportunity' => $opportunity
        ]);
    }

    /**
     * Show the form for editing the specified Project.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $opportunity = $this->repository
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
            ->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $categories       = Category::select('id', 'name')->get()->toArray();
        $keywords         = Keyword::select('id', 'name')->get()->toArray();
        $budgetTypes      = BudgetType::select('id', 'name')->get()->toArray();
        $allOpportunities = Opportunity::select('id', 'name')->get()->toArray();
        $allOrganizations = Organization::select('id', 'name')->get()->toArray();
        $users            = User::select('id', 'name')->get()->toArray();
        $statuses         = OpportunityStatus::select('id', 'name')->where('opportunity_type_id', 1)->get()->toArray();

        return view('projects.edit', [
            'type' => $opportunity->opportunityable_type,
            'pageTitle' => $opportunity->name,
            'opportunity' => $opportunity,
            'categories' => $categories,
            'keywords' => $keywords,
            'budgetTypes' => $budgetTypes,
            'allOrganizations' => $allOrganizations,
            'allOpportunities' => $allOpportunities,
            'statuses' => $statuses,
            'users' => $users
        ]);
    }

    /**
     * Update the specified Project in storage.
     *
     * @param  int                 $id
     * @param UpdateProjectRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function update($id, UpdateProjectRequest $request)
    {
        $opportunity = $this->repository
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
            ->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $opportunity = $this->repository->update($request->all(), $id);
        event(new OpportunityUpdatedEvent($opportunity));

        Flash::success('Project updated successfully.');

        return redirect(route('projects/{$opportunity}'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        $opportunity = $this->repository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $this->repository->delete($id);
        event(new OpportunityDeletedEvent($opportunity));

        Flash::success('Project deleted successfully.');

        return redirect(route('projects/{$opportunity}'));
    }
}
