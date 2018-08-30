<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Repositories\Frontend\Opportunity\InternshipRepository;

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
}
