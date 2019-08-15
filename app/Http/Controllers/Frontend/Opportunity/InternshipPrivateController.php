<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\EditFullInternshipRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\StoreFullInternshipRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\ViewInternshipRequest;
use SCCatalog\Models\Lookup\AttachmentStatus;
use SCCatalog\Models\Lookup\AttachmentType;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\Auth\Frontend\UserRepository;
use SCCatalog\Repositories\Lookup\AffiliationRepository;
use SCCatalog\Repositories\Lookup\CategoryRepository;
use SCCatalog\Repositories\Lookup\KeywordRepository;
use SCCatalog\Repositories\Lookup\OpportunityStatusRepository;
use SCCatalog\Repositories\Opportunity\InternshipAttachmentRepository;
use SCCatalog\Repositories\Opportunity\InternshipRepository;
use SCCatalog\Repositories\Organization\OrganizationRepository;
use Spatie\MediaLibrary\Media;

/**
 * Class InternshipPrivateController.
 */
class InternshipPrivateController extends Controller
{
    /**
     * @var InternshipRepository
     */
    private $internshipRepository;

    /**
     * @var InternshipAttachmentRepository
     */
    private $internshipAttachmentRepository;

    /**
     * InternshipPrivateController constructor.
     *
     * @param InternshipRepository $internshipRepository
     */
    public function __construct(InternshipRepository $internshipRepository, InternshipAttachmentRepository $internshipAttachmentRepository)
    {
        $this->internshipRepository = $internshipRepository;
        $this->internshipAttachmentRepository = $internshipAttachmentRepository;
    }

    /**
     * Display the specified Internship.
     *
     * @param ViewInternshipRequest $request
     * @param Internship            $user
     *
     * @return \Illuminate\View\View
     */
    public function show(ViewInternshipRequest $request, $id)
    {
        $internship = $this->internshipRepository
            ->with([
                'addresses',
                'notes',
                'status',
                'organization',
                'supervisorUser',
                'submittingUser',
                'affiliations',
                'categories',
                'keywords',
                'followers',
                'applicants',
                'participants',
                'mentors',
            ])
            ->getById($id);

        $attachments = $internship->getMedia();

        return view('frontend.opportunity.internship.private.show')
            ->withInternship($internship)
            ->withAttachments($attachments)
            ->with('pageTitle', $internship->name);
    }

    /**
     * Display the print-version of the specified Internship.
     *
     * @param ViewInternshipRequest $request
     * @param Internship          $internship
     *
     * @return \Illuminate\View\View
     */
    public function print(ViewInternshipRequest $request, Internship $internship)
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

        return view('frontend.opportunity.internship.private.print')
            ->withInternship($internship)
            ->withAttachments($attachments);
    }

    /**
     * Show the form for creating a new, full Internship.
     *
     * @param EditFullInternshipRequest $request
     * @param AffiliationRepository $affiliationRepository
     * @param CategoryRepository $categoryRepository
     * @param KeywordRepository $keywordRepository
     * @param OpportunityRepository $opportunityRepository
     * @param OpportunityStatusRepository $opportunityStatusRepository
     * @param OrganizationRepository $organizationRepository
     * @param UserRepository $userRepository
     *
     * @return \Illuminate\View\View
     */
    public function create(
        EditFullInternshipRequest $request,
        AffiliationRepository $affiliationRepository,
        CategoryRepository $categoryRepository,
        KeywordRepository $keywordRepository,
        OpportunityStatusRepository $opportunityStatusRepository,
        OrganizationRepository $organizationRepository,
        UserRepository $userRepository,
        AttachmentStatus $attachmentStatusRepository,
        AttachmentType $attachmentTypeRepository
    ) {
        $degreeProgram = [
            'degree_program' => 'Students wishing to register and earn credit for the SOS 484 Capstone (or Elective) Internship must meet all eligibility requirements, submit all necessary paperwork, begin the internship, and be cleared to register prior to the add/drop deadline of Session C term. Retroactive credit will not be granted.

Review SOS Internship Handbook and obtain SOS 484 registration forms <[here](https://schoolofsustainability.asu.edu/student-life/sustainability-internships-opportunities/internship-forms/)>.

Students are welcome to pursue additional internships for experience and not for credit. Students not registering for credit may start internships at any point in the semester.

Other ASU majors should contact their major department for credit inquiries.

For questions about SOS internship credit, please contact: [caroline.savalle@asu.edu](mailto:caroline.savalle@asu.edu)',
        ];

        return view('frontend.opportunity.internship.private.create')
            ->with('formMode', 'create')
            ->with('degreeProgram', (object) $degreeProgram)
            ->with('affiliations', $affiliationRepository->whereIn('opportunity_type_id', [1, 3])->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', 3)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('attachmentStatuses', $attachmentStatusRepository->get(['slug', 'name'])->pluck('name', 'slug')->toArray())
            ->with('attachmentTypes', $attachmentTypeRepository->get(['slug', 'name'])->pluck('name', 'slug')->toArray());
    }

    /**
     * Store a newly created Internship in storage.
     *
     * @param StoreFullInternshipRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(StoreFullInternshipRequest $request)
    {
        $internship = $this->internshipRepository->create($request->all());
        $internship = $this->internshipAttachmentRepository->store($internship, $request->all());

        return redirect()->route('frontend.user.dashboard')
            ->withFlashSuccess(__('Internship successfully created'));
    }

    /**
     * Show the form for updating a full, new Internship.
     *
     * @param EditFullInternshipRequest $request
     * @param BudgetTypeRepository $budgetTypeRepository
     * @param AffiliationRepository $affiliationRepository
     * @param CategoryRepository $categoryRepository
     * @param KeywordRepository $keywordRepository
     * @param OpportunityRepository $opportunityRepository
     * @param OpportunityStatusRepository $opportunityStatusRepository
     * @param OpportunityReviewStatusRepository $opportunityReviewStatusRepository
     * @param OrganizationRepository $organizationRepository
     * @param UserRepository $userRepository
     *
     * @return \Illuminate\View\View
     */
    public function edit(
        EditFullInternshipRequest $request,
        AffiliationRepository $affiliationRepository,
        CategoryRepository $categoryRepository,
        KeywordRepository $keywordRepository,
        OpportunityStatusRepository $opportunityStatusRepository,
        OrganizationRepository $organizationRepository,
        UserRepository $userRepository,
        Internship $internship
    ) {
        return view('frontend.opportunity.internship.private.edit')
            ->with('formMode', 'edit')
            ->with('internship', $internship)
            ->with('affiliations', $affiliationRepository->whereIn('opportunity_type_id', [1, 3])->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', 3)->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * Update a Internship in storage.
     *
     * @param StoreFullInternshipRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function update(StoreFullInternshipRequest $request, Internship $internship)
    {
        $internship = $this->internshipRepository->update($internship, $request->all());

        return redirect()->route('frontend.user.dashboard')
            ->withFlashSuccess(__('Internship successfully updated'));
    }
}
