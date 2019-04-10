<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\StoreAttachmentRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\RemoveAttachmentRequest;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\Opportunity\ProjectAttachmentRepository;
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
     * @param StoreAttachmentRequest $request
     *
     * @param AttachmentStatus       $attachmentStatusRepository
     * @param AttachmentType         $attachmentTypeRepository
     * @param Project                $project
     * @return \Illuminate\View\View
     */
    public function add(
        StoreAttachmentRequest $request,
        AttachmentStatus $attachmentStatusRepository,
        AttachmentType $attachmentTypeRepository,
        Project $project
    ) {
        return view('frontend.opportunity.project.private.attachment.add')
            ->with('project', $project)
            ->with('attachmentStatuses', $attachmentStatusRepository->get()->pluck('name', 'slug')->toArray())
            ->with('attachmentTypes', $attachmentTypeRepository->get()->pluck('name', 'slug')->toArray());
    }

    /**
     * Show the form for uploading a file attachment into Project.
     *
     * @param StoreAttachmentRequest $request
     * @param Project                $project
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(StoreAttachmentRequest $request, Project $project)
    {
        $project = $this->projectAttachmentRepository->store($project, $request->all());

        return redirect()->route('frontend.opportunity.project.private.show', $project)
            ->withFlashSuccess(__('Attachment uploaded successfully'));
    }

    /**
     * Edit the specified Project in storage.
     *
     * @param StoreAttachmentRequest $request
     * @param AttachmentStatus       $attachmentStatusRepository
     * @param AttachmentType         $attachmentTypeRepository
     * @param Project                $project
     * @param Media                  $media
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(
        StoreAttachmentRequest $request,
        AttachmentStatus $attachmentStatusRepository,
        AttachmentType $attachmentTypeRepository,
        Project $project,
        Media $media
    ) {
        return view('frontend.opportunity.project.private.attachment.edit')
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
     * @param StoreAttachmentRequest $request
     * @param Project                        $project
     * @param Media                          $media
     * @return
     */
    public function update(StoreAttachmentRequest $request, Project $project, Media $media)
    {
        // dd($media);
        $this->projectAttachmentRepository->update($project, $media, $request->all());

        return redirect()->route('frontend.opportunity.project.private.show', $project)
            ->withFlashSuccess(__('Attachment updated successfully'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param StoreAttachmentRequest $request
     * @param Project                $project
     * @param Media                  $media
     * @return
     */
    public function destroy(RemoveAttachmentRequest $request, Project $project, Media $media)
    {
        $this->projectAttachmentRepository->delete($project, $media);

        return redirect()->route('frontend.opportunity.project.private.show', $project)
            ->withFlashSuccess('Attachment deleted successfully');
    }
}
