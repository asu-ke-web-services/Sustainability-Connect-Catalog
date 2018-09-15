<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\ViewInternshipRequest;
use SCCatalog\Repositories\Frontend\Auth\UserRepository;
use SCCatalog\Repositories\Frontend\Opportunity\OpportunityRepository;
use SCCatalog\Repositories\Frontend\Opportunity\InternshipRepository;

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
     * @param ViewInternshipRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ViewInternshipRequest $request)
    {
        return view('frontend.opportunity.internship.index')
            ->with('internships', $this->internshipRepository->getActivePaginated(25, 'application_deadline', 'asc'))
            ->with('type', 'Internship')
            ->with('pageTitle', 'Internships');
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

        return view('frontend.opportunity.internship.show')
            ->withInternship($internship)
            ->with('type', 'Internship')
            ->with('pageTitle', $internship->name);
    }
}
