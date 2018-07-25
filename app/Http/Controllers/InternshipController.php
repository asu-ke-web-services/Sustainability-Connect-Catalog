<?php

namespace SCCatalog\Http\Controllers;

use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Response;
use SCCatalog\Criteria\InternshipCriteria;
use SCCatalog\Http\Controllers\OpportunityController;
use SCCatalog\Http\Requests\CreateOpportunityRequest;
use SCCatalog\Http\Requests\FollowOpportunityRequest;
use SCCatalog\Http\Requests\UnfollowOpportunityRequest;
use SCCatalog\Http\Requests\UpdateOpportunityRequest;
// use SCCatalog\Http\Requests\InternshipCreateRequest;
// use SCCatalog\Http\Requests\InternshipUpdateRequest;
use SCCatalog\Contracts\Repositories\OpportunityRepositoryContract as OpportunityRepository;
// use SCCatalog\Contracts\Repositories\InternshipRepositoryContract as InternshipRepository;
use SCCatalog\Models\Category;
use SCCatalog\Models\Keyword;
use SCCatalog\Models\Opportunity;
use SCCatalog\Models\Organization;
use SCCatalog\Models\User;
use SCCatalog\Validators\OpportunityValidator;
// use SCCatalog\Validators\InternshipValidator;

class InternshipController extends OpportunityController
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
     * InternshipController constructor.
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
     * Display a listing of the Internship.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->repository->pushCriteria(new RequestCriteria($request));
        $this->repository->pushCriteria(InternshipCriteria::class);
        $opportunities = $this->repository->with(['opportunityable'])->all();

        return view('internships.index', [
            'type' => $opportunities->first()->opportunityable_type,
            'pageTitle' => str_plural($opportunities->first()->opportunityable_type),
            'opportunities' => $opportunities
        ]);
    }

    /**
     * Show the form for creating a new Internship.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $keywords = Keyword::pluck('name', 'id');
        $allOpportunities = Opportunity::pluck('title', 'id');
        $allOrganizations = Organization::pluck('name', 'id');
        $status = OpportunityStatus::where('opportunity_type_id', 2)->pluck('name', 'id')->toArray();
        $users = User::pluck('name', 'id');

        return view('internships.create', [
            'type' => 'Internship',
            'pageTitle' => 'New Internship',
            'categories' => $categories,
            'keywords' => $keywords,
            'allOrganizations' => $allOrganizations,
            'allOpportunities' => $allOpportunities,
            'status' => $status,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created Internship in storage.
     *
     * @param InternshipCreateRequest $request
     *
     * @return Response
     */
    public function store(CreateOpportunityRequest $request)
    {
        $input = $request->all();

        $opportunity = $this->repository->create($input);

        Flash::success('Internship saved successfully.');

        return redirect(route('internships.index'));
    }

    /**
     * Display the specified Internship.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $this->repository->pushCriteria(InternshipCriteria::class);
        $opportunity = $this->repository
            ->with([
                'opportunityable',
                'addresses',
                'notes',
                'status',
                'parentOpportunity',
                'organization',
                'ownerUser',
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
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        return view('internships.show', [
            'type' => $opportunity->opportunityable_type,
            'pageTitle' => $opportunity->title,
            'opportunity' => $opportunity
        ]);
    }

    /**
     * Display the specified Internship.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show_admin($id)
    {
        $this->repository->pushCriteria(InternshipCriteria::class);
        $opportunity = $this->repository
            ->with([
                'opportunityable',
                'addresses',
                'notes',
                'status',
                'parentOpportunity',
                'organization',
                'ownerUser',
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
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        return view('internships.show_admin', [
            'type' => $opportunity->opportunityable_type,
            'pageTitle' => $opportunity->title,
            'opportunity' => $opportunity
        ]);
    }

    /**
     * Show the form for editing the specified Internship.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $opportunity = $this->repository->with(['opportunityable'])->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        $categories = Category::pluck('name', 'id')->toArray();
        $keywords = Keyword::pluck('name', 'id')->toArray();
        $allOpportunities = Opportunity::pluck('title', 'id')->toArray();
        $allOrganizations = Organization::pluck('name', 'id')->toArray();
        $users = User::pluck('name', 'id')->toArray();
        $status = OpportunityStatus::where('opportunity_type_id', 2)->pluck('name', 'id')->toArray();

        return view('internships.edit', [
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
     * Update the specified Internship in storage.
     *
     * @param  int                    $id
     * @param InternshipUpdateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOpportunityRequest $request)
    {
        $opportunity = $this->repository->with(['opportunityable'])->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        $opportunity = $this->repository->with(['opportunityable'])->update($request->all(), $id);

        Flash::success('Internship updated successfully.');

        return redirect(route('internships.index'));
    }

    /**
     * Remove the specified Internship from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $opportunity = $this->repository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        $this->repository->delete($id);

        Flash::success('Internship deleted successfully.');

        return redirect(route('internships.index'));
    }
}
