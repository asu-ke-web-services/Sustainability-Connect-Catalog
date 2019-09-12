<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use JavaScript;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Events\Backend\Opportunity\InternshipDeleted;
use SCCatalog\Http\Requests\Backend\Opportunity\StoreInternshipRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\DeleteInternshipRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\UpdateInternshipRequest;
use SCCatalog\Http\Requests\Backend\Opportunity\ManageInternshipRequest;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\Auth\Backend\UserRepository;
use SCCatalog\Repositories\Lookup\AffiliationRepository;
use SCCatalog\Repositories\Lookup\CategoryRepository;
use SCCatalog\Repositories\Lookup\KeywordRepository;
use SCCatalog\Repositories\Lookup\OpportunityStatusRepository;
use SCCatalog\Repositories\Opportunity\InternshipRepository;
use SCCatalog\Repositories\Organization\OrganizationRepository;

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

        $canViewRestricted = auth()->user()->hasPermissionTo('read all internships');

        JavaScript::put([
            'userAccessAffiliations' => $userAccessAffiliations ?? null,
            'canViewRestricted' => $canViewRestricted ?? false,
        ]);

        return view('backend.opportunity.internship.all')
            ->with('internships', $this->internshipRepository->getAllPaginated(10000, 'created_at', 'desc'))
            ->with('defaultOrderBy', 'created_at')
            ->with('defaultSort', 'desc');
    }

    /**
     * Show the form for creating a new Internship.
     *
     * @param ManageInternshipRequest $request
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
        ManageInternshipRequest $request,
        AffiliationRepository $affiliationRepository,
        CategoryRepository $categoryRepository,
        KeywordRepository $keywordRepository,
        InternshipRepository $internshipRepository,
        OpportunityStatusRepository $opportunityStatusRepository,
        OrganizationRepository $organizationRepository,
        UserRepository $userRepository
    ) {
        $degreeProgram = [
            'degree_program' => 'Students wishing to register and earn credit for the SOS 484 Capstone (or Elective) Internship must meet all eligibility requirements, submit all necessary paperwork, begin the internship, and be cleared to register prior to the add/drop deadline of Session C term. Retroactive credit will not be granted.

Review SOS Internship Handbook and obtain SOS 484 registration forms <[here](https://schoolofsustainability.asu.edu/student-life/sustainability-internships-opportunities/internship-forms/)>.

Students are welcome to pursue additional internships for experience and not for credit. Students not registering for credit may start internships at any point in the semester.

Other ASU majors should contact their major department for credit inquiries.

For questions about SOS internship credit, please contact: [caroline.savalle@asu.edu](mailto:caroline.savalle@asu.edu)',
        ];

        return view('backend.opportunity.internship.create')
            ->with('degreeProgram', (object) $degreeProgram)
            ->with('affiliations', $affiliationRepository->whereIn('opportunity_type_id', [1, 3])->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name', 'email'])->pluck('full_name_email', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', 3)->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * Store a newly created Internship in storage.
     *
     * @param StoreInternshipRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(StoreInternshipRequest $request)
    {
        $internship = $this->internshipRepository->create($request->all());

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
            'organization',
            'supervisorUser',
            'submittingUser',
            'affiliations',
            'categories',
            'keywords',
            'users',
            'followers',
            'applicants',
            'participants',
            'mentors',
            'createdByUser',
            'updatedByUser'
        );

        $attachments = $internship->getMedia();

        return view('backend.opportunity.internship.show')
            ->withInternship($internship)
            ->withAttachments($attachments);
    }

    /**
     * Display the print-version of the specified Internship.
     *
     * @param ManageInternshipRequest $request
     * @param Internship $internship
     *
     * @return \Illuminate\View\View
     */
    public function print(ManageInternshipRequest $request, Internship $internship)
    {
        $internship->loadMissing(
            'addresses',
            'notes',
            'status',
            'organization',
            'supervisorUser',
            'submittingUser',
            'affiliations',
            'categories',
            'keywords',
            'users',
            'createdByUser',
            'updatedByUser'
        );

        $attachments = $internship->getMedia();

        return view('backend.opportunity.internship.print')
            ->withInternship($internship)
            ->withAttachments($attachments);
    }

    /**
     * Show the form for editing the specified Internship.
     *
     * @param ManageInternshipRequest $request
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
        ManageInternshipRequest $request,
        AffiliationRepository $affiliationRepository,
        CategoryRepository $categoryRepository,
        KeywordRepository $keywordRepository,
        OpportunityStatusRepository $opportunityStatusRepository,
        OrganizationRepository $organizationRepository,
        UserRepository $userRepository,
        Internship $internship
    ) {
        $internship->loadMissing(
            'addresses',
            'affiliations',
            'notes',
            'status',
            'organization',
            'supervisorUser',
            'submittingUser',
            'categories',
            'keywords',
            'users'
        );

        // dd($internship->affiliations);

        return view('backend.opportunity.internship.edit')
            ->with('internship', $internship)
            ->with('affiliations', $affiliationRepository->whereIn('opportunity_type_id', [1, 3])->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name', 'email'])->pluck('full_name_email', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', 3)->get(['id', 'name'])->pluck('name', 'id')->toArray());
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
        $internship = $this->internshipRepository->update($internship, $request->all());

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
