<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\EditInternshipSubmissionRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\StoreInternshipSubmissionRequest;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\Frontend\Auth\UserRepository;
use SCCatalog\Repositories\Frontend\Lookup\AffiliationRepository;
use SCCatalog\Repositories\Frontend\Lookup\CategoryRepository;
use SCCatalog\Repositories\Frontend\Lookup\KeywordRepository;
use SCCatalog\Repositories\Frontend\Lookup\OpportunityStatusRepository;
use SCCatalog\Repositories\Frontend\Opportunity\InternshipRepository;
use SCCatalog\Repositories\Frontend\Organization\OrganizationRepository;

/**
 * Class InternshipSubmissionController.
 */
class InternshipSubmissionController extends Controller
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
     * Show the form for creating a new Internship.
     *
     * @param EditInternshipSubmissionRequest $request
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
        EditInternshipSubmissionRequest $request,
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

For questions about SOS internship credit, please contact: [caroline.savalle@asu.edu](mailto:caroline.savalle@asu.edu)'
        ];

        return view('frontend.opportunity.internship.create')
            ->with('degreeProgram', (object)$degreeProgram)
            ->with('affiliations', $affiliationRepository->whereIn('opportunity_type_id', [1, 3])->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', 3)->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * Store a newly created Internship in storage.
     *
     * @param StoreInternshipSubmissionRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(StoreInternshipSubmissionRequest $request)
    {
        $internship = $this->internshipRepository->create($request->all());

        return redirect()->route('frontend.opportunity.internship.show', $internship)
            ->withFlashSuccess(__('Internship created successfully'));
    }

    /**
     * Show the form for editing the specified Internship.
     *
     * @param EditInternshipSubmissionRequest $request
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
        EditInternshipSubmissionRequest $request,
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


        return view('frontend.opportunity.internship.edit')
            ->with('internship', $internship)
            ->with('affiliations', $affiliationRepository->whereIn('opportunity_type_id', [1, 3])->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', 3)->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * Update the specified Internship in storage.
     *
     * @param StoreInternshipSubmissionRequest $request
     *
     * @param Internship $internship
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function update(StoreInternshipSubmissionRequest $request, Internship $internship)
    {
        $internship = $this->internshipRepository->update($internship, $request->all());

        return redirect()->route('frontend.opportunity.internship.show', $internship)
            ->withFlashSuccess(__('Internship updated successfully'));
    }
}
