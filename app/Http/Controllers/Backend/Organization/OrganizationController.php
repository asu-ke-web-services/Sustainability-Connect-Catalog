<?php

namespace SCCatalog\Http\Controllers\Backend\Organization;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Organization\OrganizationRequest;
use SCCatalog\Http\Requests\Backend\Organization\ManageOrganizationRequest;
use SCCatalog\Repositories\Backend\Organization\OrganizationRepository;

/**
 * Class OrganizationController.
 */
class OrganizationController extends Controller
{
    /**
     * @var OrganizationRepository
     */
    private $repository;

    /**
     * OrganizationController constructor.
     *
     * @param OrganizationRepository $repository
     */
    public function __construct(OrganizationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the Organization.
     *
     * @param ManageOrganizationRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageOrganizationRequest $request)
    {
        return view('backend.organization.index')
            ->withOrganizations($this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new Organization.
     *
     * @param ManageOrganizationRequest $request
     *
     * @return mixed
     */
    public function create(ManageOrganizationRequest $request)
    {
        return view('backend.organization.create');
    }

    /**
     * Store a newly created Organization in storage.
     *
     * @param OrganizationRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(OrganizationRequest $request)
    {
        $this->repository->create($request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.organization.index')
            ->withFlashSuccess(__('Organization created successfully'));
    }

    /**
     * Show the form for editing the specified Organization.
     *
     * @param ManageOrganizationRequest $request
     * @param int                 $id
     *
     * @return mixed
     */
    public function edit(ManageOrganizationRequest $request, $id)
    {
        $organization = $this->repository->getById($id);

        return view('backend.organization.edit')
            ->withOrganization($organization);
    }

    /**
     * Update the specified Organization in storage.
     *
     * @param OrganizationRequest $request
     * @param int             $id
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(OrganizationRequest $request, $id)
    {
        $this->repository->updateById($id, $request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.organization.index')
            ->withFlashSuccess(__('Organization updated successfully'));
    }

    /**
     * Remove the specified Organization from storage.
     *
     * @param ManageOrganizationRequest $request
     * @param int                 $id
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageOrganizationRequest $request, $id)
    {
        $this->repository->deleteById($id);

        return redirect()->route('admin.organization.index')
            ->withFlashSuccess('Organization deleted successfully');
    }
}
