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
    public function getActive(ManageProjectRequest $request)
    {
        $search = '';
        if($request->has('search')){
            $search = $request->get('search');
        }

        return view('backend.opportunity.project.active')
            ->withProjects($this->projectRepository->getActivePaginated(25, $search, 'application_deadline_at', 'asc'))
            ->with('searchRequest', (object) array('search' => $search));
    }

    /**
     * @param ManageProjectRequest $request
     *
     * @return mixed
     */
    public function getExpired(ManageProjectRequest $request)
    {
        $search = '';
        if($request->has('search')){
            $search = $request->get('search');
        }

        return view('backend.opportunity.project.expired')
            ->withProjects($this->projectRepository->getExpiredPaginated(25, $search, 'application_deadline_at', 'asc'))
            ->with('searchRequest', (object) array('search' => $search));
    }

    /**
     * @param ManageProjectRequest $request
     *
     * @return mixed
     */
    public function getArchived(ManageProjectRequest $request)
    {
        $search = '';
        if($request->has('search')){
            $search = $request->get('search');
        }

        return view('backend.opportunity.project.archived')
            ->withProjects($this->projectRepository->getArchivedPaginated(25, $search, 'updated_at', 'desc'))
            ->with('searchRequest', (object) array('search' => $search));
    }

    /**
     * @param ManageProjectRequest $request
     *
     * @return mixed
     */
    public function getCompleted(ManageProjectRequest $request)
    {
        $search = '';
        if($request->has('search')){
            $search = $request->get('search');
        }

        return view('backend.opportunity.project.completed')
            ->withProjects($this->projectRepository->getCompletedPaginated(25, $search, 'updated_at', 'desc'))
            ->with('searchRequest', (object) array('search' => $search));
    }

    /**
     * @param ManageProjectRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageProjectRequest $request)
    {
        $search = '';
        if($request->has('search')){
            $search = $request->get('search');
        }

        return view('backend.opportunity.project.deleted')
            ->withProjects($this->projectRepository->getDeletedPaginated(25, $search,'deleted_at', 'desc'))
            ->with('searchRequest', (object) array('search' => $search));
    }

    /**
     * @param ManageProjectRequest $request
     *
     * @return mixed
     */
    public function getImportReview(ManageProjectRequest $request)
    {
        $search = '';
        if($request->has('search')){
            $search = $request->get('search');
        }

        return view('backend.opportunity.project.import_review')
            ->withProjects($this->projectRepository->getImportReviewsPaginated(25, $search, 'created_at', 'desc'))
            ->with('searchRequest', (object) array('search' => $search));
    }

    /**
     * @param ManageProjectRequest $request
     *
     * @return mixed
     */
    public function getProposalReviews(ManageProjectRequest $request)
    {
        $search = '';
        if($request->has('search')){
            $search = $request->get('search');
        }

        return view('backend.opportunity.project.reviews')
            ->withProjects($this->projectRepository->getProposalReviewsPaginated(25, 'created_at', 'desc'))
            ->with('searchRequest', (object) array('search' => $search));
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
