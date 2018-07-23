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
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
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
        $opportunities = $this->repository->with(['opportunityable'])->all();

        return view('projects.index')
            ->with('opportunities', $opportunities);
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
        $parentOpportunities = Opportunity::pluck('title', 'id');
        $organizations = Organization::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('projects.create', [
            'categories' => $categories,
            'keywords' => $keywords,
            'organizations' => $organizations,
            'parentOpportunities' => $parentOpportunities,
            'organizations' => $organizations,
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
        return view('projects.create_idea');
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param ProjectCreateRequest $request
     *
     * @return Response
     */
    public function store(ProjectCreateRequest $request)
    {
        $input = $request->all();

        $project = $this->repository->create($input);

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

        return view('projects.show')->with('opportunity', $opportunity);
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
        $project = $this->repository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $categories = Category::pluck('name', 'id');
        $keywords = Keyword::pluck('name', 'id');
        $parentOpportunities = Opportunity::pluck('title', 'id');
        $organizations = Organization::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('projects.edit', [
            'opportunity' => $opportunity,
            'categories' => $categories,
            'keywords' => $keywords,
            'organizations' => $organizations,
            'parentOpportunities' => $parentOpportunities,
            'organizations' => $organizations,
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
    public function update($id, ProjectUpdateRequest $request)
    {
        $project = $this->repository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $project = $this->repository->update($request->all(), $id);

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
        $project = $this->repository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $this->repository->delete($id);

        Flash::success('Project deleted successfully.');

        return redirect(route('projects.index'));
    }
}
