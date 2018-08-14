<?php

namespace SCCatalog\Http\Controllers;

use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Response;
use SCCatalog\Contracts\Repositories\OpportunityRepositoryContract as OpportunityRepository;
// use SCCatalog\Contracts\Repositories\ProjectRepositoryContract as ProjectRepository;
use SCCatalog\Criteria\ProjectCriteria;
use SCCatalog\Http\Controllers\OpportunityController;
use SCCatalog\Http\Requests\CreateOpportunityRequest;
use SCCatalog\Http\Requests\FollowOpportunityRequest;
use SCCatalog\Http\Requests\UnfollowOpportunityRequest;
use SCCatalog\Http\Requests\UpdateOpportunityRequest;
// use SCCatalog\Http\Requests\ProjectCreateRequest;
// use SCCatalog\Http\Requests\ProjectUpdateRequest;
// use SCCatalog\Validators\ProjectValidator;
use SCCatalog\Validators\OpportunityValidator;
use SCCatalog\Models\Category;
use SCCatalog\Models\Keyword;
use SCCatalog\Models\BudgetType;
use SCCatalog\Models\Opportunity;
use SCCatalog\Models\OpportunityStatus;
use SCCatalog\Models\Organization;
use SCCatalog\Models\User;

class ProjectController extends OpportunityController
{
    /**
     * @var OpportunityRepository
     */
    private $repository;

    /**
     * @var OpportunityValidator
     */
    protected $validator;

    /**
     * ProjectController constructor.
     *
     * @param OpportunityRepository $repository
     * @param OpportunityValidator $validator
     */
    public function __construct(OpportunityRepository $repository, OpportunityValidator $validator)
    {
        parent::__construct($repository, $validator);

        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the Project.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->repository->pushCriteria(new RequestCriteria($request));
        $this->repository->pushCriteria(ProjectCriteria::class);

        // if($request->has('search')) {
        //     $opportunities = Opportunity::search($request->get('search'))->get();

        // } else {
        //     $opportunities = $this->repository->with(['opportunityable'])->all();

        // }

        // return view('projects.search', [
        //     'type' => $opportunities->first()->opportunityable_type,
        //     'pageTitle' => str_plural($opportunities->first()->opportunityable_type),
        //     'opportunities' => $opportunities
        // ]);

        return view('projects.search');
    }

    /**
     * Show the form for creating a new Project.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get()->toArray();
        $keywords = Keyword::select('id', 'name')->get()->toArray();
        $budgetTypes = BudgetType::select('id', 'name')->get()->toArray();
        $allOpportunities = Opportunity::select('id', 'name')->get()->toArray();
        $allOrganizations = Organization::select('id', 'name')->get()->toArray();
        $users = User::select('id', 'name')->get()->toArray();
        $statuses = OpportunityStatus::select('id', 'name')->where('opportunity_type_id', 1)->get()->toArray();

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
     * @return Response
     */
    public function create_idea()
    {
        $categories = Category::select('id', 'name')->get()->toArray();
        $keywords = Keyword::select('id', 'name')->get()->toArray();
        $budgetTypes = BudgetType::select('id', 'name')->get()->toArray();
        $allOpportunities = Opportunity::select('id', 'name')->get()->toArray();
        $allOrganizations = Organization::select('id', 'name')->get()->toArray();
        $users = User::select('id', 'name')->get()->toArray();
        $statuses = OpportunityStatus::select('id', 'name')->where('opportunity_type_id', 1)->get()->toArray();

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
     * @return Response
     */
    public function store(CreateOpportunityRequest $request)
    {
        $input = $request->all();

        $opportunity = $this->repository->create($input);

        Flash::success('Project saved successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Display the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $this->repository->pushCriteria(ProjectCriteria::class);
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

        // dd($opportunity);

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
     * @return Response
     */
    public function show_admin($id)
    {
        $this->repository->pushCriteria(ProjectCriteria::class);
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
                // 'participants',
                // 'activeMembers',
            ])
            ->findWithoutFail($id);

        // dd($opportunity);



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
     * @return Response
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
                // 'participants',
                // 'activeMembers',
            ])
            ->findWithoutFail($id);

        // dd($opportunity);


        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $categories = Category::select('id', 'name')->get()->toArray();
        $keywords = Keyword::select('id', 'name')->get()->toArray();
        $budgetTypes = BudgetType::select('id', 'name')->get()->toArray();
        $allOpportunities = Opportunity::select('id', 'name')->get()->toArray();
        $allOrganizations = Organization::select('id', 'name')->get()->toArray();
        $users = User::select('id', 'name')->get()->toArray();
        $statuses = OpportunityStatus::select('id', 'name')->where('opportunity_type_id', 1)->get()->toArray();

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
     * @return Response
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
                // 'participants',
                // 'activeMembers',
            ])
            ->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        dd($request->all());

        $opportunity = $this->repository->with(['opportunityable'])->update($request->all(), $id);

        Flash::success('Project updated successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $opportunity = $this->repository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $this->repository->delete($id);

        Flash::success('Project deleted successfully.');

        return redirect(route('projects.index'));
    }
}
