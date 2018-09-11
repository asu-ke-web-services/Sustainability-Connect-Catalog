<?php

namespace SCCatalog\Http\Controllers\Backend\Organization;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Repositories\Backend\Organization\OrganizationRepository;
use SCCatalog\Http\Requests\Backend\Organization\ManageOrganizationRequest;

/**
 * Class OrganizationStatusController.
 */
class OrganizationStatusController extends Controller
{
    /**
     * @var OrganizationRepository
     */
    protected $organizationRepository;

    /**
     * @param OrganizationRepository $organizationRepository
     */
    public function __construct(OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    /**
     * @param ManageOrganizationRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageOrganizationRequest $request)
    {
        return view('backend.organization.deleted')
            ->withOrganizations($this->organizationRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageOrganizationRequest $request
     * @param int                  $deletedProjectId
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(ManageOrganizationRequest $request, $deletedProjectId)
    {
        $this->organizationRepository->forceDelete($deletedProjectId);

        return redirect()->route('admin.organization.deleted')->withFlashSuccess(__('alerts.backend.organizations.deleted_permanently'));
    }

    /**
     * @param ManageOrganizationRequest $request
     * @param int                  $deletedProjectId
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     */
    public function restore(ManageOrganizationRequest $request, $deletedProjectId)
    {
        $this->organizationRepository->restore($deletedProjectId);

        return redirect()->route('admin.organization.index')->withFlashSuccess(__('alerts.backend.organizations.restored'));
    }
}
