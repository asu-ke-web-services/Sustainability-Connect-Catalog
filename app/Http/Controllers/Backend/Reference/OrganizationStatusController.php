<?php

namespace SCCatalog\Http\Controllers\Backend\Reference;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Reference\OrganizationStatusRequest;
use SCCatalog\Http\Requests\Backend\Reference\ManageReferenceRequest;
use SCCatalog\Repositories\Reference\OrganizationStatusRepository;

/**
 * Class OrganizationStatusController.
 */
class OrganizationStatusController extends Controller
{
    /**
     * @var OrganizationStatusRepository
     */
    private $repository;

    /**
     * OrganizationStatusController constructor.
     *
     * @param OrganizationStatusRepository $repository
     */
    public function __construct(OrganizationStatusRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the OrganizationStatus.
     *
     * @param ManageReferenceRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageReferenceRequest $request)
    {
        return view('backend.lookup.organization_status.index')
            ->with('organizationStatuses', $this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new OrganizationStatus.
     *
     * @param ManageReferenceRequest $request
     *
     * @return mixed
     */
    public function create(ManageReferenceRequest $request)
    {
        return view('backend.lookup.organization_status.create');
    }

    /**
     * Store a newly created OrganizationStatus in storage.
     *
     * @param OrganizationStatusRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(OrganizationStatusRequest $request)
    {
        $this->repository->create($request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.organization_status.index')
            ->withFlashSuccess(__('OrganizationStatus created successfully'));
    }

    /**
     * Show the form for editing the specified OrganizationStatus.
     *
     * @param ManageReferenceRequest $request
     * @param int                 $id
     *
     * @return mixed
     */
    public function edit(ManageReferenceRequest $request, $id)
    {
        $organization_status = $this->repository->getById($id);

        return view('backend.lookup.organization_status.edit')
            ->with('organizationStatus', $organization_status);
    }

    /**
     * Update the specified OrganizationStatus in storage.
     *
     * @param OrganizationStatusRequest $request
     * @param int             $id
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(OrganizationStatusRequest $request, $id)
    {
        $this->repository->updateById($id, $request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.organization_status.index')
            ->withFlashSuccess(__('OrganizationStatus updated successfully'));
    }

    /**
     * Remove the specified OrganizationStatus from storage.
     *
     * @param ManageReferenceRequest $request
     * @param int                 $id
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageReferenceRequest $request, $id)
    {
        $this->repository->deleteById($id);

        return redirect()->route('admin.lookup.organization_status.index')
            ->withFlashSuccess('OrganizationStatus deleted successfully');
    }
}
