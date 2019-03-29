<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\ViewInternshipRequest;
use SCCatalog\Repositories\Frontend\Opportunity\InternshipRepository;

/**
 * Class InternshipSearchController.
 */
class InternshipSearchController extends Controller
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
    public function searchActive(ViewInternshipRequest $request)
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

        return view('frontend.opportunity.internship.search_active')
            ->withInternships($this->internshipRepository->getActivePaginated(25, 'application_deadline_at', 'asc'))
            ->with('userAccessAffiliations', $userAccessAffiliations)
            ->with('canViewRestricted', $canViewRestricted)
            ->with('defaultOrderBy', 'application_deadline_at')
            ->with('defaultSort', 'asc');
    }
}
