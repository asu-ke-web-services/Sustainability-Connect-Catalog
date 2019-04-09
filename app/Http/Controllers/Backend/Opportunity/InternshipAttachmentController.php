<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Opportunity\ManageInternshipAttachmentRequest;
use SCCatalog\Models\Lookup\AttachmentStatus;
use SCCatalog\Models\Lookup\AttachmentType;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\Backend\Opportunity\InternshipAttachmentRepository;
use Spatie\MediaLibrary\Media;

/**
 * Class InternshipAttachmentController.
 */
class InternshipAttachmentController extends Controller
{
    /**
     * @var InternshipAttachmentRepository
     */
    private $internshipAttachmentRepository;

    /**
     * InternshipController constructor.
     *
     * @param InternshipAttachmentRepository $internshipAttachmentRepository
     */
    public function __construct(InternshipAttachmentRepository $internshipAttachmentRepository)
    {
        $this->internshipAttachmentRepository = $internshipAttachmentRepository;
    }

    /**
     * Show the form for uploading a file attachment into Internship.
     *
     * @param StoreInternshipRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function add(
        ManageInternshipAttachmentRequest $request,
        Internship $internship,
        AttachmentStatus $attachmentStatusRepository,
        AttachmentType $attachmentTypeRepository
    ) {
        return view('backend.opportunity.internship.attachment.add')
            ->with('attachmentStatuses', $attachmentStatusRepository->get(['slug', 'name'])->pluck('name', 'slug')->toArray())
            ->with('attachmentTypes', $attachmentTypeRepository->get(['slug', 'name'])->pluck('name', 'slug')->toArray())
            ->with('internship', $internship);
    }

    /**
     * Show the form for uploading a file attachment into Internship.
     *
     * @param StoreInternshipRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function store(ManageInternshipAttachmentRequest $request, Internship $internship)
    {
        $internship = $this->internshipAttachmentRepository->store($internship, $request->all());

        return redirect()->route('admin.opportunity.internship.show', $internship)
            ->withFlashSuccess(__('Attachment uploaded successfully'));
    }

    /**
     * Edit the specified Internship in storage.
     *
     * @param ManageInternshipAttachmentRequest $request
     * @param Internship                        $internship
     * @param Media                          $media
     * @return
     */
    public function edit(
        ManageInternshipAttachmentRequest $request,
        Internship $internship,
        Media $media,
        AttachmentStatus $attachmentStatusRepository,
        AttachmentType $attachmentTypeRepository
    ) {
        return view('backend.opportunity.internship.attachment.edit')
            ->with('internship', $internship)
            ->with('media', $media)
            ->with('attachmentStatuses', $attachmentStatusRepository->get(['id', 'slug'])->pluck('slug', 'id')->toArray())
            ->with('attachmentTypes', $attachmentTypeRepository->get(['id', 'slug'])->pluck('slug', 'id')->toArray());
    }

    /**
     * Update the specified Internship in storage.
     *
     * @param ManageInternshipAttachmentRequest $request
     * @param Internship                        $internship
     * @param Media                          $media
     * @return
     */
    public function update(ManageInternshipAttachmentRequest $request, Internship $internship, Media $media)
    {
        $this->internshipAttachmentRepository->update($internship, $media, $request->all());

        return redirect()->route('admin.opportunity.internship.show', $internship)
            ->withFlashSuccess(__('Attachment updated successfully'));
    }

    /**
     * Remove the specified Internship from storage.
     *
     * @param ManageInternshipAttachmentRequest $request
     * @param Internship                        $internship
     * @param Media                          $media
     * @return
     */
    public function destroy(ManageInternshipAttachmentRequest $request, Internship $internship, Media $media)
    {
        $this->internshipAttachmentRepository->delete($internship, $media);

        return redirect()->route('admin.opportunity.internship.show', $internship)
            ->withFlashSuccess('Attachment deleted successfully');
    }
}
