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
        $opportunity = $this->repository
            ->getById($id);

        return view('internships.show', [
            'type' => $opportunity->opportunityable_type,
            'pageTitle' => $opportunity->name,
            'opportunity' => $opportunity
        ]);
    }
}
