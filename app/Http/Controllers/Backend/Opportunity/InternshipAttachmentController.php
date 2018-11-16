<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Attachment\ManageAttachmentRequest;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\Backend\Opportunity\InternshipRepository;

/**
 * Class InternshipAttachmentController.
 */
class InternshipAttachmentController extends Controller
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
     * Store a newly created Internship in storage.
     *
     *
     * @param ManageAttachmentRequest $request
     * @param Internship              $internship
     * @return void
     */
    public function store(ManageAttachmentRequest $request, Internship $internship)
    {
    }

    /**
     * Update the specified Internship in storage.
     *
     * @param ManageAttachmentRequest $request
     * @param Internship              $internship
     * @param                         $attachmentId
     * @return void
     */
    public function update(ManageAttachmentRequest $request, Internship $internship, $attachmentId)
    {
    }

    /**
     * Remove the specified Internship from storage.
     *
     * @param ManageAttachmentRequest $request
     * @param Internship              $internship
     * @param                         $attachmentId
     * @return void
     */
    public function destroy(ManageAttachmentRequest $request, Internship $internship, $attachmentId)
    {
    }
}
