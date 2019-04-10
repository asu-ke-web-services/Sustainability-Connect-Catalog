<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\StoreNoteRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\RemoveNoteRequest;
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
     * Show the form for uploading a note into Internship.
     *
     * @param StoreNoteRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function add(
        StoreNoteRequest $request,
        Internship $internship
    ) {
        return view('frontend.opportunity.internship.private.note.add')
            ->with('internship', $internship);
    }

    /**
     * Store the note into Internship.
     *
     * @param StoreNoteRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function store(StoreNoteRequest $request, Internship $internship)
    {
        $internship = $this->internshipNoteRepository->store($internship, $request->all());

        return redirect()->route('frontend.opportunity.internship.private.show', $internship)
            ->withFlashSuccess(__('Note uploaded successfully'));
    }

    /**
     * Edit the specified Internship Note in storage.
     *
     * @param StoreNoteRequest $request
     * @param Internship                        $internship
     * @param Note                          $note
     * @return
     */
    public function edit(
        StoreNoteRequest $request,
        Internship $internship,
        Note $note
    ) {
        return view('frontend.opportunity.internship.private.note.edit')
            ->with('internship', $internship)
            ->with('note', $note);
    }

    /**
     * Update the specified Internship Note in storage.
     *
     * @param StoreNoteRequest $request
     * @param Internship          $internship
     * @param Note             $note
     * @return
     */
    public function update(StoreNoteRequest $request, Internship $internship, Note $note)
    {
        $this->internshipNoteRepository->update($internship, $note, $request->all());

        return redirect()->route('frontend.opportunity.internship.private.show', $internship)
            ->withFlashSuccess(__('Note updated successfully'));
    }

    /**
     * Remove the specified Internship Note from storage.
     *
     * @param RemoveNoteRequest $request
     * @param Internship           $internship
     * @param Note              $note
     * @return
     */
    public function destroy(RemoveNoteRequest $request, Internship $internship, Note $note)
    {
        $this->internshipNoteRepository->delete($internship, $note);

        return redirect()->route('frontend.opportunity.internship.private.show', $internship)
            ->withFlashSuccess('Note deleted successfully');
    }
}
