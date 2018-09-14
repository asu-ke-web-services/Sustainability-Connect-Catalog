<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Repositories\Backend\Opportunity\ProjectRepository;
use SCCatalog\Http\Requests\Backend\Opportunity\ManageProjectRequest;

/**
 * Class ProjectStatusController.
 */
class ProjectStatusController extends Controller
{
    /**
     * @var ProjectRepository
     */
    protected $projectRepository;

    /**
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * @param ManageProjectRequest $request
     *
     * @return mixed
     */
    public function getDeactivated(ManageProjectRequest $request)
    {
        return view('backend.opportunity.project.deactivated')
            ->withProjects($this->projectRepository->getInactivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageProjectRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageProjectRequest $request)
    {
        return view('backend.opportunity.project.deleted')
            ->withProjects($this->projectRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageProjectRequest $request
     * @param int                  $deletedProjectId
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(ManageProjectRequest $request, $deletedProjectId)
    {
        $this->projectRepository->forceDelete($deletedProjectId);

        return redirect()->route('admin.opportunity.project.deleted')->withFlashSuccess(__('alerts.backend.opportunity.projects.deleted_permanently'));
    }

    /**
     * @param ManageProjectRequest $request
     * @param int                  $deletedProjectId
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     */
    public function restore(ManageProjectRequest $request, $deletedProjectId)
    {
        $this->projectRepository->restore($deletedProjectId);

        return redirect()->route('admin.opportunity.project.index')->withFlashSuccess(__('alerts.backend.opportunity.projects.restored'));
    }
}
