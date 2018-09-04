<?php

namespace SCCatalog\Http\Controllers\Backend\Lookup;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Lookup\OrganizationStatusRequest;
use SCCatalog\Http\Requests\Backend\Lookup\ManageLookupRequest;
use SCCatalog\Repositories\Backend\Lookup\OrganizationStatusRepository;

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
     * @param ManageLookupRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageLookupRequest $request)
    {
        return view('backend.lookup.organization_status.index')
            ->with('organization_statuses', $this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new OrganizationStatus.
     *
     * @param ManageLookupRequest $request
     *
     * @return mixed
     */
    public function create(ManageLookupRequest $request)
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
     * @param ManageLookupRequest $request
     * @param int                 $id
     *
     * @return mixed
     */
    public function edit(ManageLookupRequest $request, $id)
    {
        $organization_status = $this->repository->getById($id);

        return view('backend.lookup.organization_status.edit')
            ->with('organization_status', $organization_status);
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
     * @param ManageLookupRequest $request
     * @param int                 $id
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageLookupRequest $request, $id)
    {
        $this->repository->deleteById($id);

        return redirect()->route('admin.lookup.organization_status.index')
            ->withFlashSuccess('OrganizationStatus deleted successfully');
    }
}
