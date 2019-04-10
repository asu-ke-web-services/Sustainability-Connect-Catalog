<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Note\ManageNoteRequest;
use SCCatalog\Http\Requests\Backend\Note\StoreNoteRequest;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Models\Note\Note;
use SCCatalog\Repositories\Opportunity\ProjectNoteRepository;

/**
 * Class ProjectNoteController.
 */
class ProjectNoteController extends Controller
{
    /**
     * @var ProjectNoteRepository
     */
    private $projectNoteRepository;

    /**
     * ProjectController constructor.
     *
     * @param ProjectNoteRepository $projectNoteRepository
     */
    public function __construct(ProjectNoteRepository $projectNoteRepository)
    {
        $this->projectNoteRepository = $projectNoteRepository;
    }

    /**
     * Show the form for uploading a note into Project.
     *
     * @param ManageNoteRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function add(
        ManageNoteRequest $request,
        Project $project
    ) {
        return view('frontend.opportunity.project.private.note.add')
            ->with('project', $project);
    }

    /**
     * Store the note into Project.
     *
     * @param StoreNoteRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function store(StoreNoteRequest $request, Project $project)
    {
        $project = $this->projectNoteRepository->store($project, $request->all());

        return redirect()->route('frontend.opportunity.project.private.show', $project)
            ->withFlashSuccess(__('Note uploaded successfully'));
    }

    /**
     * Edit the specified Project Note in storage.
     *
     * @param ManageNoteRequest $request
     * @param Project                        $project
     * @param Note                          $note
     * @return
     */
    public function edit(
        ManageNoteRequest $request,
        Project $project,
        Note $note
    ) {
        return view('frontend.opportunity.project.private.note.edit')
            ->with('project', $project)
            ->with('note', $note);
    }

    /**
     * Update the specified Project Note in storage.
     *
     * @param StoreNoteRequest $request
     * @param Project          $project
     * @param Note             $note
     * @return
     */
    public function update(StoreNoteRequest $request, Project $project, Note $note)
    {
        $this->projectNoteRepository->update($project, $note, $request->all());

        return redirect()->route('frontend.opportunity.project.private.show', $project)
            ->withFlashSuccess(__('Note updated successfully'));
    }

    /**
     * Remove the specified Project Note from storage.
     *
     * @param ManageNoteRequest $request
     * @param Project           $project
     * @param Note              $note
     * @return
     */
    public function destroy(ManageNoteRequest $request, Project $project, Note $note)
    {
        $this->projectNoteRepository->delete($project, $note);

        return redirect()->route('frontend.opportunity.project.private.show', $project)
            ->withFlashSuccess('Note deleted successfully');
    }
}
