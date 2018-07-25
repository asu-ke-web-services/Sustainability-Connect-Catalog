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

        if($request->has('search')) {
            $opportunities = Opportunity::search($request->get('search'))->get();

        } else {
            $opportunities = $this->repository->with(['opportunityable'])->all();

        }

        return view('projects.index', [
            'type' => $opportunities->first()->opportunityable_type,
            'pageTitle' => str_plural($opportunities->first()->opportunityable_type),
            'opportunities' => $opportunities
        ]);
        // return view('projects.search')
        //     ->with('opportunities', $opportunities);
    }

    /**
     * Show the form for creating a new Project.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $keywords = Keyword::pluck('name', 'id');
        $allOpportunities = Opportunity::pluck('title', 'id');
        $allOrganizations = Organization::pluck('name', 'id');
        $status = OpportunityStatus::where('opportunity_type_id', 1)->pluck('name', 'id')->toArray();
        $users = User::pluck('name', 'id');

        return view('projects.create', [
            'type' => 'Project',
            'pageTitle' => 'New Project',
            'categories' => $categories,
            'keywords' => $keywords,
            'allOrganizations' => $allOrganizations,
            'allOpportunities' => $allOpportunities,
            'status' => $status,
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
        $categories = Category::pluck('name', 'id');
        $keywords = Keyword::pluck('name', 'id');
        $allOpportunities = Opportunity::pluck('title', 'id');
        $allOrganizations = Organization::pluck('name', 'id');
        $status = OpportunityStatus::where('opportunity_type_id', 1)->pluck('name', 'id')->toArray();
        $users = User::pluck('name', 'id');

        return view('projects.create_idea', [
            'type' => 'Project',
            'pageTitle' => 'New Project Idea',
            'categories' => $categories,
            'keywords' => $keywords,
            'allOrganizations' => $allOrganizations,
            'allOpportunities' => $allOpportunities,
            'status' => $status,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param ProjectCreateRequest $request
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
        $opportunity = $this->repository->with(['opportunityable'])->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        return view('projects.show', [
            'type' => $opportunity->opportunityable_type,
            'pageTitle' => $opportunity->title,
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
        $opportunity = $this->repository->with(['opportunityable'])->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        return view('projects.show_admin', [
            'type' => $opportunity->opportunityable_type,
            'pageTitle' => $opportunity->title,
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
        $opportunity = $this->repository->with(['opportunityable'])->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $categories = Category::pluck('name', 'id')->toArray();
        $keywords = Keyword::pluck('name', 'id')->toArray();
        $allOpportunities = Opportunity::pluck('title', 'id')->toArray();
        $allOrganizations = Organization::pluck('name', 'id')->toArray();
        $users = User::pluck('name', 'id')->toArray();
        $status = OpportunityStatus::where('opportunity_type_id', 1)->pluck('name', 'id')->toArray();


        // $project = array();

        // $project['opportunityId'] = $opportunity->id;
        // $project['projectId'] = $opportunity->opportunityable_id;
        // $project['opportunityType'] = $opportunity->opportunityable_type;
        // $project['title'] = $opportunity->title;
        // $project['altTitle'] = $opportunity->alt_title;
        // $project['slug'] = $opportunity->slug;
        // $project['startDate'] = $opportunity->start_date;
        // $project['endDate'] = $opportunity->end_date;
        // $project['listingStarts'] = $opportunity->listing_starts;
        // $project['listingEnds'] = $opportunity->listing_ends;
        // $project['applicationDeadline'] = $opportunity->application_deadline;
        // $project['applicationDeadlineText'] = $opportunity->application_deadline_text;
        // $project['isHidden'] = $opportunity->is_hidden;
        // $project['summary'] = $opportunity->summary;
        // $project['description'] = $opportunity->description;

        // $project['statusId'] = $opportunity->opportunity_status_id;
        // $project['parentOpportunityId'] = $opportunity->parent_opportunity_id;
        // $project['organizationId'] = $opportunity->organization_id;
        // $project['supervisorUserId'] = $opportunity->owner_user_id;
        // $project['submittingUserId'] = $opportunity->submitting_user_id;

        // $project['compensation'] = $opportunity->opportunityable->compensation;
        // $project['responsibilities'] = $opportunity->opportunityable->responsibilities;
        // $project['learningOutcomes'] = $opportunity->opportunityable->learning_outcomes;
        // $project['sustainabilityContribution'] = $opportunity->opportunityable->sustainability_contribution;
        // $project['qualifications'] = $opportunity->opportunityable->qualifications;
        // $project['applicationInstructions'] = $opportunity->opportunityable->application_instructions;
        // $project['implementationPaths'] = $opportunity->opportunityable->implementation_paths;
        // $project['budgetType'] = $opportunity->opportunityable->budget_type;
        // $project['budgetAmount'] = $opportunity->opportunityable->budget_amount;
        // $project['programLead'] = $opportunity->opportunityable->program_lead;
        // $project['successStory'] = $opportunity->opportunityable->success_story;
        // $project['libraryCollection'] = $opportunity->opportunityable->library_collection;

        return view('projects.edit', [
            'type' => $opportunity->opportunityable_type,
            'pageTitle' => $opportunity->title,
            'opportunity' => $opportunity,
            'categories' => $categories,
            'keywords' => $keywords,
            'allOrganizations' => $allOrganizations,
            'allOpportunities' => $allOpportunities,
            'status' => $status,
            'users' => $users
        ]);
    }

    /**
     * Update the specified Project in storage.
     *
     * @param  int                 $id
     * @param ProjectUpdateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOpportunityRequest $request)
    {
        // dd($request);

        $opportunity = $this->repository->with(['opportunityable'])->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

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
