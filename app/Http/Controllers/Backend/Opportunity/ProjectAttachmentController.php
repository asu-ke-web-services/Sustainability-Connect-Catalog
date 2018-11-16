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
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * ProjectController constructor.
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
     * @param ManageAttachmentRequest $request
     * @param Project                 $project
     * @return void
     */
    public function store(ManageAttachmentRequest $request, Project $project)
    {
    }

    /**
     * Update the specified Project in storage.
     *
     * @param ManageAttachmentRequest $request
     * @param Project                 $project
     * @param                         $attachmentId
     * @return void
     */
    public function update(ManageAttachmentRequest $request, Project $project, $attachmentId)
    {
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param ManageAttachmentRequest $request
     * @param Project                 $project
     * @param                         $attachmentId
     * @return void
     */
    public function destroy(ManageAttachmentRequest $request, Project $project, $attachmentId)
    {
    }
}
