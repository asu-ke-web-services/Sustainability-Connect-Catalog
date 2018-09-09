<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\OpportunityAttachment\ManageOpportunityAttachmentRequest;
use SCCatalog\Http\Requests\Backend\OpportunityAttachment\OpportunityAttachmentRequest;
use SCCatalog\Repositories\Backend\Attachment\AttachmentRepository;
use SCCatalog\Repositories\Backend\Opportunity\OpportunityRepository;

/**
 * Class OpportunityAttachmentController.
 */
class OpportunityAttachmentController extends Controller
{
    /**
     * @var AttachmentRepository
     */
    private $attachmentRepository;

    /**
     * @var OpportunityRepository
     */
    private $opportunityRepository;

    /**
     * OpportunityController constructor.
     *
     * @param AttachmentRepository $attachmentRepository
     * @param OpportunityRepository $opportunityRepository
     */
    public function __construct(AttachmentRepository $attachmentRepository, OpportunityRepository $opportunityRepository)
    {
        $this->attachmentRepository = $attachmentRepository;
        $this->opportunityRepository = $opportunityRepository;
    }

    /**
     * Store a newly created Opportunity in storage.
     *
     *
     * @param OpportunityAttachmentRequest $request
     * @param $opportunityId
     * @return void
     */
    public function store(OpportunityAttachmentRequest $request, $opportunityId)
    {
    }

    /**
     * Update the specified Opportunity in storage.
     *
     * @param OpportunityAttachmentRequest $request
     * @param $opportunityId
     * @param $attachmentId
     * @return void
     */
    public function update(OpportunityAttachmentRequest $request, $opportunityId, $attachmentId)
    {
    }

    /**
     * Remove the specified Opportunity from storage.
     *
     * @param OpportunityAttachmentRequest $request
     * @param $opportunityId
     * @param $attachmentId
     * @return void
     */
    public function destroy(OpportunityAttachmentRequest $request, $opportunityId, $attachmentId)
    {
    }
}
