<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Events\Backend\Opportunity\InternshipCreated;
use SCCatalog\Events\Backend\Opportunity\InternshipUpdated;
use SCCatalog\Events\Backend\Opportunity\InternshipDeleted;
use SCCatalog\Http\Requests\Backend\Opportunity\StoreInternshipRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\DeleteInternshipRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\UpdateInternshipRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\ViewInternshipRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\ManageInternshipRequest;
use SCCatalog\Repositories\Backend\Auth\UserRepository;
use SCCatalog\Repositories\Backend\Lookup\AffiliationRepository;
use SCCatalog\Repositories\Backend\Lookup\CategoryRepository;
use SCCatalog\Repositories\Backend\Lookup\KeywordRepository;
use SCCatalog\Repositories\Backend\Lookup\OpportunityStatusRepository;
use SCCatalog\Repositories\Backend\Opportunity\OpportunityRepository;
use SCCatalog\Repositories\Backend\Opportunity\InternshipRepository;
use SCCatalog\Repositories\Backend\Organization\OrganizationRepository;

/**
 * Class InternshipController.
 */
class InternshipController extends Controller
{
    /**
     * @var InternshipRepository
     */
    private $internshipRepository;

    /**
     * InternshipController constructor.
     *
     * @param InternshipRepository $internshipRepository
     */
    public function __construct(InternshipRepository $internshipRepository)
    {
        $this->internshipRepository = $internshipRepository;
    }

    /**
     * Display a listing of the Internship.
     *
     * @param ManageInternshipRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageInternshipRequest $request)
    {
        return view('backend.opportunity.internship.index')
            ->with('internships', $this->internshipRepository->getActivePaginated(25, 'application_deadline', 'asc'));
    }

    /**
     * Show the form for creating a new Internship.
     *
     * @param ManageInternshipRequest $request
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
            ManageInternshipRequest $request,
            AffiliationRepository $affiliationRepository,
            CategoryRepository $categoryRepository,
            KeywordRepository $keywordRepository,
            OpportunityRepository $opportunityRepository,
            OpportunityStatusRepository $opportunityStatusRepository,
            OrganizationRepository $organizationRepository,
            UserRepository $userRepository
    )
    {
        return view('backend.opportunity.internship.create')
            ->with('affiliations', $affiliationRepository->where('opportunity_type_id', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('opportunities', $opportunityRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * Store a newly created Internship in storage.
     *
     * @param InternshipRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(StoreInternshipRequest $request)
    {
        $internship = $this->internshipRepository->create($request->only(
            'name',
            'public_name',
            'description',
            'listing_starts',
            'listing_ends',
            'application_deadline',
            'start_date',
            'end_date',
            'organization_id',
            'parent_opportunity_id',
            'supervisor_user_id',
            'opportunityable',
            'affiliations',
            'categories',
            'keywords',
            'addresses'
        ));

        event(new InternshipCreated($internship));

        return redirect()->route('admin.opportunity.internship.show', $internship)
            ->withFlashSuccess(__('Internship created successfully'));
    }

    /**
     * Display the specified Internship.
     *
     * @param ManageInternshipRequest $request
     * @param Internship            $user
     *
     * @return \Illuminate\View\View
     */
    public function show(ManageInternshipRequest $request, $id)
    {
        $internship = $this->internshipRepository
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

        return view('backend.opportunity.internship.show')
            ->withInternship($internship);
    }

    /**
     * Show the form for editing the specified Internship.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(
            ManageInternshipRequest $request,
            AffiliationRepository $affiliationRepository,
            CategoryRepository $categoryRepository,
            KeywordRepository $keywordRepository,
            OpportunityRepository $opportunityRepository,
            OpportunityStatusRepository $opportunityStatusRepository,
            OrganizationRepository $organizationRepository,
            UserRepository $userRepository,
            $id
    )
    {
        $internship = $this->internshipRepository
            ->with([
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
                'followers',
                'applicants',
            ])
            ->getById($id);

        return view('backend.opportunity.internship.edit')
            ->with('internship', $internship)
            ->with('affiliations', $affiliationRepository->where('opportunity_type_id', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('opportunities', $opportunityRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * Update the specified Internship in storage.
     *
     * @param  int                 $id
     * @param InternshipRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function update(UpdateInternshipRequest $request, $id)
    {
        $internship = $this->internshipRepository->updateById($internship->id, $request->only(
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

        event(new InternshipUpdated($internship));

        return redirect()->route('admin.opportunity.internship.show', $project)
            ->withFlashSuccess(__('Internship updated successfully'));
    }

    /**
     * Remove the specified Internship from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function destroy(ManageInternshipRequest $request, $id)
    {
        $internship = $this->internshipRepository->getById($id);
        $this->internshipRepository->deleteById($id);

        event(new InternshipDeleted($internship));

        return redirect()->route('admin.opportunity.internship.index')
            ->withFlashSuccess('Internship deleted successfully');
    }
}
