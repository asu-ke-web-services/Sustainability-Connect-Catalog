<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Opportunity\ManageProjectAttachmentRequest;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\Backend\Opportunity\ProjectAttachmentRepository;
use Spatie\MediaLibrary\Media;
use SCCatalog\Models\Lookup\AttachmentStatus;
use SCCatalog\Models\Lookup\AttachmentType;

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
     * Show the form for uploading a file attachment into Project.
     *
     * @param StoreProjectRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function add(
        ManageProjectAttachmentRequest $request,
        AttachmentStatus $attachmentStatusRepository,
        AttachmentType $attachmentTypeRepository,
        Project $project
    ) {
        return view('backend.opportunity.project.attachment.add')
            ->with('attachmentStatuses', $attachmentStatusRepository->get(['slug', 'name'])->pluck('name', 'slug')->toArray())
            ->with('attachmentTypes', $attachmentTypeRepository->get(['slug', 'name'])->pluck('name', 'slug')->toArray())
            ->with('project', $project);
    }

    /**
     * Show the form for uploading a file attachment into Project.
     *
     * @param StoreProjectRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function store(ManageProjectAttachmentRequest $request, Project $project)
    {
        $project = $this->projectAttachmentRepository->store($project, $request->all());

        return redirect()->route('admin.opportunity.project.show', $project)
            ->withFlashSuccess(__('Attachment uploaded successfully'));
    }

    /**
     * Edit the specified Project in storage.
     *
     * @param ManageProjectAttachmentRequest $request
     * @param Project                        $project
     * @param Media                          $media
     * @return
     */
    public function edit(
        ManageProjectAttachmentRequest $request,
        AttachmentStatus $attachmentStatusRepository,
        AttachmentType $attachmentTypeRepository,
        Project $project,
        Media $media
    ) {
        return view('backend.opportunity.project.attachment.edit')
            ->with('attachmentStatuses', $attachmentStatusRepository->get(['id', 'slug'])->pluck('slug', 'id')->toArray())
            ->with('attachmentTypes', $attachmentTypeRepository->get(['id', 'slug'])->pluck('slug', 'id')->toArray())
            ->with('project', $project)
            ->with('media', $media);
    }

    /**
     * Update the specified Project in storage.
     *
     * @param ManageProjectAttachmentRequest $request
     * @param Project                        $project
     * @param Media                          $media
     * @return
     */
    public function update(ManageProjectAttachmentRequest $request, Project $project, Media $media)
    {
        $this->projectAttachmentRepository->update($project, $media, $request->all());

        return redirect()->route('admin.opportunity.project.show', $project)
            ->withFlashSuccess(__('Attachment updated successfully'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param ManageProjectAttachmentRequest $request
     * @param Project                        $project
     * @param Media                          $media
     * @return
     */
    public function destroy(ManageProjectAttachmentRequest $request, Project $project, Media $media)
    {
        $this->projectAttachmentRepository->delete($project, $media);

        return redirect()->route('admin.opportunity.project.show', $project)
            ->withFlashSuccess('Attachment deleted successfully');
    }
}
