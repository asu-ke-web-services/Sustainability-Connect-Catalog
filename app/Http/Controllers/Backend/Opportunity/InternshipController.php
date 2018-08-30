<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\CreateInternshipRequest;
use SCCatalog\Http\Requests\UpdateInternshipRequest;
use SCCatalog\Models\Category;
use SCCatalog\Models\Keyword;
use SCCatalog\Models\Opportunity;
use SCCatalog\Models\OpportunityStatus;
use SCCatalog\Models\Organization;
use SCCatalog\Models\User;
use SCCatalog\Repositories\Backend\Opportunity\InternshipRepository;

class InternshipController extends Controller
{
    /**
     * @var InternshipRepository
     */
    private $repository;

    /**
     * InternshipController constructor.
     *
     * @param InternshipRepository $repository
     */
    public function __construct(InternshipRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the Internship.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // view React SearchApp
        return view('internships.search');
    }

    /**
     * Show the form for creating a new Internship.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories       = Category::select('id', 'name')->get()->toArray();
        $keywords         = Keyword::select('id', 'name')->get()->toArray();
        $allOpportunities = Opportunity::select('id', 'name')->get()->toArray();
        $allOrganizations = Organization::select('id', 'name')->get()->toArray();
        $users            = User::select('id', 'name')->get()->toArray();
        $statuses         = OpportunityStatus::select('id', 'name')->where('opportunity_type_id', 1)->get()->toArray();

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
     * @param CreateInternshipRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function store(CreateInternshipRequest $request)
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

        Flash::success('Internship saved successfully.');

        event(new OpportunityCreatedEvent($opportunity));

        return redirect(route('internships/{$opportunity}'));
    }

    /**
     * Display the specified Internship.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // $this->repository->pushCriteria(InternshipCriteria::class);
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
     * Show the form for editing the specified Internship.
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
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        $categories       = Category::select('id', 'name')->get()->toArray();
        $keywords         = Keyword::select('id', 'name')->get()->toArray();
        $allOpportunities = Opportunity::select('id', 'name')->get()->toArray();
        $allOrganizations = Organization::select('id', 'name')->get()->toArray();
        $users            = User::select('id', 'name')->get()->toArray();
        $statuses         = OpportunityStatus::select('id', 'name')->where('opportunity_type_id', 1)->get()->toArray();

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
     * @param  int                 $id
     * @param UpdateInternshipRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function update($id, UpdateInternshipRequest $request)
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

        return redirect(route('internships/{$opportunity}'));
    }

    /**
     * Remove the specified Internship from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
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

        return redirect(route('internships/{$opportunity}'));
    }
}
