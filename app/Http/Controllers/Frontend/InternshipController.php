<?php

namespace SCCatalog\Http\Controllers\Frontend;

use Flash;
use Illuminate\Http\Request;
use Response;
use SCCatalog\Criteria\InternshipCriteria;
use SCCatalog\Http\Controllers\OpportunityController;
use SCCatalog\Http\Requests\CreateOpportunityRequest;
use SCCatalog\Http\Requests\FollowOpportunityRequest;
use SCCatalog\Http\Requests\UnfollowOpportunityRequest;
use SCCatalog\Http\Requests\UpdateOpportunityRequest;
use SCCatalog\Contracts\Repositories\OpportunityRepositoryContract as OpportunityRepository;
use SCCatalog\Models\Category;
use SCCatalog\Models\Keyword;
use SCCatalog\Models\Opportunity;
use SCCatalog\Models\OpportunityStatus;
use SCCatalog\Models\Organization;
use SCCatalog\Models\User;

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
        // view React SearchApp
        return view('internships.search');
    }

    /**
     * Show the form for creating a new Internship.
     *
     * @return Response
     */
    public function create()
    {
        $categories       = Category::select('id', 'name')->get()->toArray();
        $keywords         = Keyword::select('id', 'name')->get()->toArray();
        $allOpportunities = Opportunity::select('id', 'name')->get()->toArray();
        $allOrganizations = Organization::select('id', 'name')->get()->toArray();
        $users            = User::select('id', 'name')->get()->toArray();
        $statuses         = OpportunityStatus::select('id', 'name')->where('opportunity_type_id', 2)->get()->toArray();

        return view('internships.create', [
            'type' => 'Internship',
            'pageTitle' => 'New Internship',
            'categories' => $categories,
            'keywords' => $keywords,
            'allOrganizations' => $allOrganizations,
            'allOpportunities' => $allOpportunities,
            'statuses' => $statuses,
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

        event(new OpportunityCreatedEvent($opportunity));

        return redirect(route('internships/{$opportunity}'));
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
                'supervisorUser',
                'submittingUser',
                'categories',
                'keywords',
                'followers',
                'applicants',
            ])
            ->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        return view('internships.show', [
            'type' => $opportunity->opportunityable_type,
            'pageTitle' => $opportunity->name,
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
                'supervisorUser',
                'submittingUser',
                'categories',
                'keywords',
                'followers',
                'applicants',
            ])
            ->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        return view('internships.show_admin', [
            'type' => $opportunity->opportunityable_type,
            'pageTitle' => $opportunity->name,
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
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        $categories       = Category::select('id', 'name')->get()->toArray();
        $keywords         = Keyword::select('id', 'name')->get()->toArray();
        $allOpportunities = Opportunity::select('id', 'name')->get()->toArray();
        $allOrganizations = Organization::select('id', 'name')->get()->toArray();
        $users            = User::select('id', 'name')->get()->toArray();
        $statuses         = OpportunityStatus::select('id', 'name')->where('opportunity_type_id', 2)->get()->toArray();

        return view('internships.edit', [
            'type' => $opportunity->opportunityable_type,
            'pageTitle' => $opportunity->name,
            'opportunity' => $opportunity,
            'categories' => $categories,
            'keywords' => $keywords,
            'allOrganizations' => $allOrganizations,
            'allOpportunities' => $allOpportunities,
            'statuses' => $statuses,
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
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        $opportunity = $this->repository->update($request->all(), $id);
        event(new OpportunityUpdatedEvent($opportunity));

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
        event(new OpportunityDeletedEvent($opportunity));

        Flash::success('Internship deleted successfully.');

        return redirect(route('internships.index'));
    }
}
