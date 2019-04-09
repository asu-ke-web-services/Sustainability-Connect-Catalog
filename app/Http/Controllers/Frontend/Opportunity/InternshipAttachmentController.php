<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\StoreAttachmentRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\RemoveAttachmentRequest;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\Frontend\Opportunity\InternshipAttachmentRepository;
use Spatie\MediaLibrary\Media;
use SCCatalog\Models\Lookup\AttachmentStatus;
use SCCatalog\Models\Lookup\AttachmentType;

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
     * @param StoreAttachmentRequest $request
     *
     * @param AttachmentStatus       $attachmentStatusRepository
     * @param AttachmentType         $attachmentTypeRepository
     * @param Internship                $internship
     * @return \Illuminate\View\View
     */
    public function add(
        StoreAttachmentRequest $request,
        AttachmentStatus $attachmentStatusRepository,
        AttachmentType $attachmentTypeRepository,
        Internship $internship
    ) {
        return view('frontend.opportunity.internship.private.attachment.add')
            ->with('internship', $internship)
            ->with('attachmentStatuses', $attachmentStatusRepository->get()->pluck('name', 'slug')->toArray())
            ->with('attachmentTypes', $attachmentTypeRepository->get()->pluck('name', 'slug')->toArray());
    }

    /**
     * Show the form for uploading a file attachment into Internship.
     *
     * @param StoreAttachmentRequest $request
     * @param Internship                $internship
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(StoreAttachmentRequest $request, Internship $internship)
    {
        $internship = $this->internshipAttachmentRepository->store($internship, $request->all());

        return redirect()->route('frontend.opportunity.internship.private.show', $internship)
            ->withFlashSuccess(__('Attachment uploaded successfully'));
    }

    /**
     * Edit the specified Internship in storage.
     *
     * @param StoreAttachmentRequest $request
     * @param AttachmentStatus       $attachmentStatusRepository
     * @param AttachmentType         $attachmentTypeRepository
     * @param Internship                $internship
     * @param Media                  $media
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(
        StoreAttachmentRequest $request,
        AttachmentStatus $attachmentStatusRepository,
        AttachmentType $attachmentTypeRepository,
        Internship $internship,
        Media $media
    ) {
        return view('frontend.opportunity.internship.private.attachment.edit')
            ->with('internship', $internship)
            ->with('media', $media)
            ->with('type', $attachmentTypeRepository->where('slug', $media->getCustomProperty('type'))->get()->pluck('slug')->first())
            ->with('visibility', $attachmentStatusRepository->where('slug', $media->getCustomProperty('visibility'))->get()->pluck('slug')->first())
            ->with('attachmentStatuses', $attachmentStatusRepository->get()->pluck('name', 'slug')->toArray())
            ->with('attachmentTypes', $attachmentTypeRepository->get()->pluck('name', 'slug')->toArray());
    }

    /**
     * Update the specified Internship in storage.
     *
     * @param StoreAttachmentRequest $request
     * @param Internship                        $internship
     * @param Media                          $media
     * @return
     */
    public function update(StoreAttachmentRequest $request, Internship $internship, Media $media)
    {
        // dd($media);
        $this->internshipAttachmentRepository->update($internship, $media, $request->all());

        return redirect()->route('frontend.opportunity.internship.private.show', $internship)
            ->withFlashSuccess(__('Attachment updated successfully'));
    }

    /**
     * Remove the specified Internship from storage.
     *
     * @param StoreAttachmentRequest $request
     * @param Internship                $internship
     * @param Media                  $media
     * @return
     */
    public function destroy(RemoveAttachmentRequest $request, Internship $internship, Media $media)
    {
        $this->internshipAttachmentRepository->delete($internship, $media);

        return redirect()->route('frontend.opportunity.internship.private.show', $internship)
            ->withFlashSuccess('Attachment deleted successfully');
    }
}
