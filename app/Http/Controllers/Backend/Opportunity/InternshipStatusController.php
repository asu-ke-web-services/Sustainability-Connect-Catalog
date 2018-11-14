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
    public function getActive(ManageInternshipRequest $request)
    {
        $search = '';
        if($request->has('search')){
            $search = $request->get('search');
        }

        return view('backend.opportunity.internship.active')
            ->withInternships($this->internshipRepository->getActivePaginated(25, $search, 'created_at', 'desc'))
            ->with('searchRequest', (object) array('search' => $search));
    }

    /**
     * @param ManageInternshipRequest $request
     *
     * @return mixed
     */
    public function getInactive(ManageInternshipRequest $request)
    {
        $search = '';
        if($request->has('search')){
            $search = $request->get('search');
        }

        return view('backend.opportunity.internship.inactive')
            ->withInternships($this->internshipRepository->getInactivePaginated(25, $search, 'updated_at', 'desc'))
            ->with('searchRequest', (object) array('search' => $search));
    }

    /**
     * @param ManageInternshipRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageInternshipRequest $request)
    {
        $search = '';
        if($request->has('search')){
            $search = $request->get('search');
        }

        return view('backend.opportunity.internship.deleted')
            ->withInternships($this->internshipRepository->getDeletedPaginated(25, $search, 'deleted_at', 'desc'))
            ->with('searchRequest', (object) array('search' => $search));
    }

    /**
     * @param ManageInternshipRequest $request
     *
     * @return mixed
     */
    public function getImportReview(ManageInternshipRequest $request)
    {
        $search = '';
        if($request->has('search')){
            $search = $request->get('search');
        }

        return view('backend.opportunity.internship.import_review')
            ->withInternships($this->internshipRepository->getImportReviewPaginated(25, $search, 'created_at', 'desc'))
            ->with('searchRequest', (object) array('search' => $search));
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
