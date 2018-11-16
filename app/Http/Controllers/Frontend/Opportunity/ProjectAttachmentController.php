<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\OpportunityAttachment\UploadProjectAttachmentRequest;
use SCCatalog\Repositories\Frontend\Opportunity\ProjectRepository;

/**
 * Class ProjectAttachmentController.
 */
class ProjectAttachmentController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * ProjectAttachmentController constructor.
     *
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Store a newly created Project in storage.
     *
     *
     * @param UploadProjectAttachmentRequest $request
     * @param Project $project
     * @return void
     */
    public function store(UploadProjectAttachmentRequest $request, Project $project)
    {
    }
}
