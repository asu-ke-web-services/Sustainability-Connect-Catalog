<?php

namespace SCCatalog\Http\Controllers\Backend\Internship;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Repositories\Backend\Opportunity\InternshipRepository;
use SCCatalog\Http\Requests\Backend\Opportunity\ManageInternshipRequest;

/**
 * Class InternshipStatusController.
 */
class InternshipStatusController extends Controller
{
    /**
     * @var InternshipRepository
     */
    protected $internshipRepository;

    /**
     * @param InternshipRepository $internshipRepository
     */
    public function __construct(InternshipRepository $internshipRepository)
    {
        $this->internshipRepository = $internshipRepository;
    }

    /**
     * @param ManageInternshipRequest $request
     *
     * @return mixed
     */
    public function getDeactivated(ManageInternshipRequest $request)
    {
        return view('backend.opportunity.internship.deactivated')
            ->withInternships($this->internshipRepository->getInactivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageInternshipRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageInternshipRequest $request)
    {
        return view('backend.opportunity.internship.deleted')
            ->withInternships($this->internshipRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageInternshipRequest $request
     * @param int                     $id
     * @param                         $status
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     */
    public function mark(ManageInternshipRequest $request, $id, $status)
    {
        $this->internshipRepository->mark($id, $status);

        return redirect()->route(
            $status == 1 ?
            'admin.opportunity.internship.index' :
            'admin.opportunity.internship.deactivated'
        )->withFlashSuccess(__('alerts.backend.opportunity.internships.updated'));
    }

    /**
     * @param ManageInternshipRequest $request
     * @param int                     $deletedInternshipId
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(ManageInternshipRequest $request, $deletedInternshipId)
    {
        $this->internshipRepository->forceDelete($deletedInternshipId);

        return redirect()->route('admin.opportunity.internship.deleted')->withFlashSuccess(__('alerts.backend.opportunity.internships.deleted_permanently'));
    }

    /**
     * @param ManageInternshipRequest $request
     * @param int                     $deletedInternshipId
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     */
    public function restore(ManageInternshipRequest $request, $deletedInternshipId)
    {
        $this->internshipRepository->restore($deletedInternshipId);

        return redirect()->route('admin.opportunity.internship.index')->withFlashSuccess(__('alerts.backend.opportunity.internships.restored'));
    }
}
