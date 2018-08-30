<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Frontend\Opportunity\OpportunityController;
use SCCatalog\Http\Requests\CreateOpportunityRequest;
use SCCatalog\Http\Requests\UpdateOpportunityRequest;
use SCCatalog\Models\Category;
use SCCatalog\Models\Keyword;
use SCCatalog\Models\BudgetType;
use SCCatalog\Models\Opportunity;
use SCCatalog\Models\OpportunityStatus;
use SCCatalog\Models\Organization;
use SCCatalog\Models\User;
use SCCatalog\Repositories\Frontend\Opportunity\OpportunityRepository;

class ProjectController extends OpportunityController
{
    /**
     * @var OpportunityRepository
     */
    private $repository;

    /**
     * ProjectController constructor.
     *
     * @param OpportunityRepository $repository
     */
    public function __construct(OpportunityRepository $repository)
    {
        parent::__construct($repository);

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
     * Show the form for submitting project idea.
     *
     * @return \Illuminate\View\View
     */
    public function create_idea()
    {
        $categories       = Category::select('id', 'name')->get()->toArray();
        $keywords         = Keyword::select('id', 'name')->get()->toArray();
        $budgetTypes      = BudgetType::select('id', 'name')->get()->toArray();
        $allOpportunities = Opportunity::select('id', 'name')->get()->toArray();
        $allOrganizations = Organization::select('id', 'name')->get()->toArray();
        $users            = User::select('id', 'name')->get()->toArray();
        $statuses         = OpportunityStatus::select('id', 'name')->where('opportunity_type_id', 1)->get()->toArray();

        return view('projects.create_idea', [
            'type' => 'Project',
            'pageTitle' => 'New Project Idea',
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
     * @param CreateOpportunityRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function store(CreateOpportunityRequest $request)
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
     * Display the specified Project.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show_admin($id)
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

        return view('projects.show_admin', [
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
     * @param UpdateOpportunityRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function update($id, UpdateOpportunityRequest $request)
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
