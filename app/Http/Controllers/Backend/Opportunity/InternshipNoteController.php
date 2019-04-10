<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Note\ManageNoteRequest;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Models\Note\Note;
use SCCatalog\Repositories\Opportunity\InternshipNoteRepository;

/**
 * Class InternshipNoteController.
 */
class InternshipNoteController extends Controller
{
    /**
     * @var InternshipNoteRepository
     */
    private $internshipNoteRepository;

    /**
     * InternshipController constructor.
     *
     * @param InternshipNoteRepository $internshipNoteRepository
     */
    public function __construct(InternshipNoteRepository $internshipNoteRepository)
    {
        $this->internshipNoteRepository = $internshipNoteRepository;
    }

    /**
     * Show the form for uploading a file note into Internship.
     *
     * @param ManageNoteRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function add(
        ManageNoteRequest $request,
        Internship $internship
    ) {
        return view('backend.opportunity.internship.note.add')
            ->with('internship', $internship);
    }

    /**
     * Show the form for uploading a file note into Internship.
     *
     * @param ManageNoteRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function store(ManageNoteRequest $request, Internship $internship)
    {
        $internship = $this->internshipNoteRepository->store($internship, $request->all());

        return redirect()->route('admin.opportunity.internship.show', $internship)
            ->withFlashSuccess(__('Note uploaded successfully'));
    }

    /**
     * Edit the specified Internship in storage.
     *
     * @param ManageNoteRequest $request
     * @param Internship        $internship
     * @param Note              $note
     * @return
     */
    public function edit(
        ManageNoteRequest $request,
        Internship $internship,
        Note $note
    ) {
        return view('backend.opportunity.internship.note.edit')
            ->with('internship', $internship)
            ->with('note', $note);
    }

    /**
     * Update the specified Internship in storage.
     *
     * @param ManageNoteRequest $request
     * @param Internship        $internship
     * @param Note              $note
     * @return
     */
    public function update(ManageNoteRequest $request, Internship $internship, Note $note)
    {
        $this->internshipNoteRepository->update($internship, $note, $request->all());

        return redirect()->route('admin.opportunity.internship.show', $internship)
            ->withFlashSuccess(__('Note updated successfully'));
    }

    /**
     * Remove the specified Internship from storage.
     *
     * @param ManageNoteRequest $request
     * @param Internship                        $internship
     * @param Note                          $note
     * @return
     */
    public function destroy(ManageNoteRequest $request, Internship $internship, Note $note)
    {
        $this->internshipNoteRepository->delete($internship, $note);

        return redirect()->route('admin.opportunity.internship.show', $internship)
            ->withFlashSuccess('Note deleted successfully');
    }
}
