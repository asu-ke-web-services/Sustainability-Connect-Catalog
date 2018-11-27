<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Attachment\ManageAttachmentRequest;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\Backend\Opportunity\ProjectRepository;

/**
 * Class ProjectAttachmentController.
 */
class ProjectAttachmentController extends Controller
{
    /**
     * @var ProjectAttachmentRepository
     */
    private $projectAttachmentRepository;

    /**
     * ProjectController constructor.
     *
     * @param ProjectAttachmentRepository $projectAttachmentRepository
     */
    public function __construct(ProjectAttachmentRepository $projectAttachmentRepository)
    {
        $this->projectAttachmentRepository = $projectAttachmentRepository;
    }

    /**
     * Create a new Project Attachment in storage.
     *
     *
     * @param ManageAttachmentRequest $request
     * @param Project $project
     * @return
     */
    public function create(ManageAttachmentRequest $request, Project $project)
    {
        return view('backend.attachment.create');
    }

    /**
     * Store a new Project Attachment in storage.
     *
     *
     * @param ManageProjectAttachmentRequest $request
     * @param Project $project
     * @return
     */
    public function store(ManageProjectAttachmentRequest $request, Project $project)
    {
        $this->projectAttachmentRepository->create($request->all());

        return redirect()->route('admin.opportunity.project.show', $project)
            ->withFlashSuccess(__('Project created successfully'));
    }

    /**
     * Edit the specified Project in storage.
     *
     * @param ManageProjectAttachmentRequest $request
     * @param Project                 $project
     * @param                         $attachmentId
     * @return
     */
//    public function edit(ManageProjectAttachmentRequest $request, Project $project, $attachmentId)
//    {
//        return view('backend.attachment.edit')
//            ->with('project', $project)
//            ->with('attachmentId', $attachmentId);
//    }

    /**
     * Update the specified Project in storage.
     *
     * @param ManageProjectAttachmentRequest $request
     * @param Project                 $project
     * @param                         $attachmentId
     * @return
     */
//    public function update(ManageProjectAttachmentRequest $request, Project $project, $attachmentId)
//    {
//        $this->projectAttachmentRepository->update($project, $attachmentId);
//
//        return redirect()->route('admin.opportunity.project.show', $project)
//            ->withFlashSuccess(__('Project Attachment updated successfully'));
//    }

    /**
     * Remove the specified Project from storage.
     *
     * @param ManageProjectAttachmentRequest $request
     * @param Project                 $project
     * @param                         $attachmentId
     * @return
     */
    public function destroy(ManageProjectAttachmentRequest $request, Project $project, $attachmentId)
    {
        $this->projectAttachmentRepository->deleteById($project, $attachmentId);

        return redirect()->route('admin.opportunity.project.index')
            ->withFlashSuccess('Project deleted successfully');
    }
}
