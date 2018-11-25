<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use JavaScript;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\ViewInternshipRequest;
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
        if ( auth()->user() !== null ) {
            $userAccessAffiliations = auth()->user()->accessAffiliations
                ->map(function ($affiliation) {
                    return $affiliation['slug'];
                })->toJson();

            $canViewRestricted = auth()->user()->hasPermissionTo('read all internships');
        }

        JavaScript::put([
            'userAccessAffiliations' => $userAccessAffiliations ?? null,
            'canViewRestricted' => $canViewRestricted ?? false
        ]);

        return view('frontend.opportunity.internship.index')
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
                'followers',
                'applicants',
            ])
            ->getById($id);

        $userAccessAffiliations = false;
        $canViewRestricted = false;
        $isFollowed = false;
        $isApplicationSubmitted = false;

        if ( auth()->user() !== null ) {
            $userAccessAffiliations = auth()->user()->accessAffiliations
                ->map(function ($affiliation) {
                    return $affiliation['slug'];
                })->toJson();

            $canViewRestricted = auth()->user()->hasPermissionTo('read all internships');

            $followedInternships = auth()->user()->followedInternships
                ->map(function ($internship) {
                    return $internship['id'];
                })->toArray();

            $isFollowed = in_array($id, $followedInternships);

            $appliedProjects = auth()->user()->projectApplications
                ->map(function ($project) {
                    return $project['id'];
                })->toArray();

            $isApplicationSubmitted = in_array($id, $appliedProjects);
        }

        return view('frontend.opportunity.internship.show')
            ->withInternship($internship)
            ->with('type', 'Internship')
            ->with('pageTitle', $internship->name)
            ->with('userAccessAffiliations', $userAccessAffiliations)
            ->with('canViewRestricted', $canViewRestricted)
            ->with('isFollowed', $isFollowed)
            ->with('isApplicationSubmitted', $isApplicationSubmitted);
    }
}
