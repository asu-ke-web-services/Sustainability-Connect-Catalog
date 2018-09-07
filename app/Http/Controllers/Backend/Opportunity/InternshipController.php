<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Events\Backend\Opportunity\InternshipCreatedEvent;
use SCCatalog\Events\Backend\Opportunity\InternshipUpdatedEvent;
use SCCatalog\Events\Backend\Opportunity\InternshipDeletedEvent;
use SCCatalog\Http\Requests\Backend\Opportunity\InternshipRequest;
use SCCatalog\Repositories\Backend\Opportunity\InternshipRepository;

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
        return view('backend.opportunity.internship.index')
            ->withInternships($this->internshipRepository->paginate(25));
    }

    /**
     * Show the form for creating a new Internship.
     *
     * @param ManageInternshipRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function create(ManageInternshipRequest $request)
    {
        return view('backend.opportunity.internship.create');
    }

    /**
     * Store a newly created Internship in storage.
     *
     * @param InternshipRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(InternshipRequest $request)
    {
        $this->internshipRepository->create($request->only(
            'field1',
            'field2',
        ));

        // event(new InternshipCreated($internship));

        return redirect()->route('admin.opportunity.internship.index')
            ->withFlashSuccess(__('Internship created successfully'));
    }

    /**
     * Display the specified Internship.
     *
     * @param ManageInternshipRequest $request
     * @param Internship            $user
     *
     * @return \Illuminate\View\View
     */
    public function show(ManageInternshipRequest $request, $id)
    {
        return view('backend.opportunity.internship.show')
            ->withInternships($internship);
    }

    /**
     * Show the form for editing the specified Internship.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(ManageInternshipRequest $request, $id)
    {
        return view('backend.opportunity.internship.edit')
            ->withInternship($internship);
    }

    /**
     * Update the specified Internship in storage.
     *
     * @param  int                 $id
     * @param InternshipRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function update(InternshipRequest $request, $id)
    {
        $internship = $this->internshipRepository->updateById($internship->id, $request->only(
            'field1',
            'field2'
        ));

        // event(new InternshipUpdated($internship));

        return redirect()->route('admin.opportunity.internship.index')
            ->withFlashSuccess(__('Internship updated successfully'));
    }

    /**
     * Remove the specified Internship from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function destroy(ManageInternshipRequest $request, $id)
    {
        $this->internshipRepository->deleteById($internship->id);
        return redirect()->route('admin.opportunity.internship.index')
            ->withFlashSuccess('Internship deleted successfully');


        $internship = $this->internshipRepository->getById($id);
        $this->internshipRepository->deleteById($id);

        // event(new InternshipDeleted($internship));

        return redirect()->route('admin.opportunity.internship.index')
            ->withFlashSuccess('Internship deleted successfully');
    }
}
