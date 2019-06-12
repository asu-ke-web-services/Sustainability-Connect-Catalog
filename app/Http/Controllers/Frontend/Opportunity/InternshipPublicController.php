<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\ViewInternshipRequest;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\Opportunity\InternshipRepository;

/**
 * Class InternshipPublicController.
 */
class InternshipPublicController extends Controller
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
     * Display a listing of the Internships.
     *
     * @param ViewInternshipRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ViewInternshipRequest $request)
    {
        $userAccessAffiliations = [];
        $canViewRestricted = false;

        if (null !== auth()->user()) {
            $userAccessAffiliations = auth()->user()->accessAffiliations
                ->map(function ($affiliation) {
                    return $affiliation['slug'];
                })->toArray();

            $canViewRestricted = auth()->user()->hasPermissionTo('read all internships');
        }

        return view('frontend.opportunity.internship.public.index')
            ->withInternships($this->internshipRepository->getActivePaginated(200, 'application_deadline_at', 'asc'))
            ->with('pageTitle', 'Internships')
            ->with('userAccessAffiliations', $userAccessAffiliations)
            ->with('canViewRestricted', $canViewRestricted)
            ->with('defaultOrderBy', 'application_deadline_at')
            ->with('defaultSort', 'asc');
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
            ])
            ->getById($id);

        $attachments = $internship->getMedia();
        $publicAttachments = [];

        foreach ($attachments as $attachment) {
            if ($attachment->getCustomProperty('visibility') === 'public') {
                $publicAttachments[] = $attachment;
            }
        }

        $userAccessAffiliations = false;
        $canViewRestricted = false;
        $isFollowed = false;
        $isApplicationSubmitted = false;

        if (auth()->user() !== null) {
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

            $appliedInternships = auth()->user()->internshipApplications
                ->map(function ($internship) {
                    return $internship['id'];
                })->toArray();

            $isApplicationSubmitted = in_array($id, $appliedInternships);
        }

        return view('frontend.opportunity.internship.public.show')
            ->withInternship($internship)
            ->with('type', 'Internship')
            ->with('pageTitle', $internship->name)
            ->with('userAccessAffiliations', $userAccessAffiliations)
            ->with('canViewRestricted', $canViewRestricted)
            ->with('isFollowed', $isFollowed)
            ->with('isApplicationSubmitted', $isApplicationSubmitted)
            ->with('publicAttachments', $publicAttachments);
    }
}
