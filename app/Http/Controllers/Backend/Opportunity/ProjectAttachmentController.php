<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Opportunity\ManageProjectAttachmentRequest;
use SCCatalog\Models\Lookup\AttachmentStatus;
use SCCatalog\Models\Lookup\AttachmentType;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\Opportunity\ProjectAttachmentRepository;
use Spatie\MediaLibrary\Media;

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
            ->with('project', $project)
            ->with('attachmentStatuses', $attachmentStatusRepository->get()->pluck('name', 'slug')->toArray())
            ->with('attachmentTypes', $attachmentTypeRepository->get()->pluck('name', 'slug')->toArray());
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
            ->with('project', $project)
            ->with('media', $media)
            ->with('type', $attachmentTypeRepository->where('slug', $media->getCustomProperty('type'))->get()->pluck('slug')->first())
            ->with('visibility', $attachmentStatusRepository->where('slug', $media->getCustomProperty('visibility'))->get()->pluck('slug')->first())
            ->with('attachmentStatuses', $attachmentStatusRepository->get()->pluck('name', 'slug')->toArray())
            ->with('attachmentTypes', $attachmentTypeRepository->get()->pluck('name', 'slug')->toArray());
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
