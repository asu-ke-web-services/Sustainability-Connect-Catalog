<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use JavaScript;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Events\Backend\Opportunity\InternshipDeleted;
use SCCatalog\Http\Requests\Backend\Opportunity\CreateInternshipRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\DeleteInternshipRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\UpdateInternshipRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\ManageInternshipRequest;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\Backend\Auth\UserRepository;
use SCCatalog\Repositories\Backend\Lookup\AffiliationRepository;
use SCCatalog\Repositories\Backend\Lookup\CategoryRepository;
use SCCatalog\Repositories\Backend\Lookup\KeywordRepository;
use SCCatalog\Repositories\Backend\Lookup\OpportunityStatusRepository;
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
        $userAccessAffiliations = auth()->user()->accessAffiliations
            ->map(function ($affiliation) {
                return $affiliation['slug'];
            })->toJson();

        $canViewRestricted = auth()->user()->hasPermissionTo('read restricted internship');

        JavaScript::put([
            'userAccessAffiliations' => $userAccessAffiliations ?? null,
            'canViewRestricted' => $canViewRestricted ?? false
        ]);

        return view('backend.opportunity.internship.index')
            ->with('internships', $this->internshipRepository->getActivePaginated(25, 'updated_at', 'desc'));
    }

    /**
     * Show the form for creating a new Internship.
     *
     * @param CreateInternshipRequest $request
     * @param AffiliationRepository $affiliationRepository
     * @param CategoryRepository $categoryRepository
     * @param KeywordRepository $keywordRepository
     * @param InternshipRepository $internshipRepository
     * @param OpportunityStatusRepository $opportunityStatusRepository
     * @param OrganizationRepository $organizationRepository
     * @param UserRepository $userRepository
     *
     * @return \Illuminate\View\View
     */
    public function create(
        CreateInternshipRequest $request,
        AffiliationRepository $affiliationRepository,
        CategoryRepository $categoryRepository,
        KeywordRepository $keywordRepository,
        InternshipRepository $internshipRepository,
        OpportunityStatusRepository $opportunityStatusRepository,
        OrganizationRepository $organizationRepository,
        UserRepository $userRepository
    )
    {
        return view('backend.opportunity.internship.create')
            ->with('affiliations', $affiliationRepository->where('opportunity_type_id', '!=', 1)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', '!=', 1)->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * Store a newly created Internship in storage.
     *
     * @param CreateInternshipRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(CreateInternshipRequest $request)
    {
        $internship = $this->internshipRepository->create($request->only(
            'name',
            'description',
            'listing_start_at',
            'listing_end_at',
            'application_deadline_at',
            'application_deadline_text',
            'opportunity_status_id',
            'opportunity_start_at',
            'opportunity_end_at',
            'organization_id',
            // 'parent_opportunity_id',
            'supervisor_user_id',
            'affiliations',
            'categories',
            'keywords',
            'addresses'
        ));

        return redirect()->route('admin.opportunity.internship.show', $internship)
            ->withFlashSuccess(__('Internship created successfully'));
    }

    /**
     * Display the specified Internship.
     *
     * @param ManageInternshipRequest $request
     * @param Internship $internship
     *
     * @return \Illuminate\View\View
     */
    public function show(ManageInternshipRequest $request, Internship $internship)
    {
        $internship->loadMissing(
            'addresses',
            'notes',
            'status',
            // 'parentOpportunity',
            'organization',
            'supervisorUser',
            'submittingUser',
            'affiliations',
            'categories',
            'keywords',
            'users'
        );

        return view('backend.opportunity.internship.show')
            ->withInternship($internship);
    }

    /**
     * Show the form for editing the specified Internship.
     *
     * @param UpdateInternshipRequest $request
     * @param AffiliationRepository $affiliationRepository
     * @param CategoryRepository $categoryRepository
     * @param KeywordRepository $keywordRepository
     * @param OpportunityStatusRepository $opportunityStatusRepository
     * @param OrganizationRepository $organizationRepository
     * @param UserRepository $userRepository
     * @param Internship $internship
     *
     * @return \Illuminate\View\View
     */
    public function edit(
        UpdateInternshipRequest $request,
        AffiliationRepository $affiliationRepository,
        CategoryRepository $categoryRepository,
        KeywordRepository $keywordRepository,
        OpportunityStatusRepository $opportunityStatusRepository,
        OrganizationRepository $organizationRepository,
        UserRepository $userRepository,
        Internship $internship
    )
    {
        $internship->loadMissing(
            'addresses',
            'notes',
            'status',
            // 'parentOpportunity',
            'organization',
            'supervisorUser',
            'submittingUser',
            'affiliations',
            'categories',
            'keywords',
            'users'
        );

        return view('backend.opportunity.internship.edit')
            ->with('internship', $internship)
            ->with('affiliations', $affiliationRepository->where('opportunity_type_id', '!=', 1)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', '!=', 1)->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * Update the specified Internship in storage.
     *
     * @param UpdateInternshipRequest $request
     *
     * @param Internship $internship
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function update(UpdateInternshipRequest $request, Internship $internship)
    {
        $internship = $this->internshipRepository->update($internship, $request->only(
            'name',
            'description',
            'listing_start_at',
            'listing_end_at',
            'application_deadline_at',
            'application_deadline_text',
            'opportunity_start_at',
            'opportunity_end_at',
            'opportunity_status_id',
            'organization_id',
            // 'parent_opportunity_id',
            'supervisor_user_id',
            'affiliations',
            'categories',
            'keywords',
            'addresses'
        ));

        return redirect()->route('admin.opportunity.internship.show', $internship)
            ->withFlashSuccess(__('Internship updated successfully'));
    }

    /**
     * Remove the specified Internship from storage.
     *
     * @param DeleteInternshipRequest $request
     * @param Internship $internship
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function destroy(DeleteInternshipRequest $request, Internship $internship)
    {
        $this->internshipRepository->deleteById($internship->id);

        event(new InternshipDeleted($internship));

        return redirect()->route('admin.opportunity.internship.index')
            ->withFlashSuccess('Internship deleted successfully');
    }

    /**
     * Clone internship.
     *
     * @param CloneInternshipRequest $request
     * @param Internship $internship
     * @return
     * @throws \Throwable
     */
    public function clone(CloneInternshipRequest $request, Internship $internship)
    {
        // $internship = $this->internshipRepository->getById($internshipId);

        $internship = $this->internshipRepository->clone($internship);

        event(new InternshipCloned($internship));

        return redirect()->route('admin.backend.opportunity.internship.show', $internship)
            ->withFlashSuccess('Internship cloned successfully');
    }

}
