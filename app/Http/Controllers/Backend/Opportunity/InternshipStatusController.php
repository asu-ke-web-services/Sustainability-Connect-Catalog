<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

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
     * @param ManageProjectRequest $request
     *
     * @return mixed
     */
    public function getNeedsReview(ManageInternshipRequest $request)
    {
        return view('backend.opportunity.internship.review')
            ->withProjects($this->internshipRepository->getReviewPaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageInternshipRequest $request
     * @param int                     $deletedInternshipId
     *
     * @return mixed
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
     */
    public function restore(ManageInternshipRequest $request, $deletedInternshipId)
    {
        $this->internshipRepository->restore($deletedInternshipId);

        return redirect()->route('admin.opportunity.internship.index')->withFlashSuccess(__('alerts.backend.opportunity.internships.restored'));
    }
}
