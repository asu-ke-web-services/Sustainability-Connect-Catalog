<?php

namespace SCCatalog\Http\Controllers\Backend\Reference;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Reference\OrganizationTypeRequest;
use SCCatalog\Http\Requests\Backend\Reference\ManageReferenceRequest;
use SCCatalog\Repositories\Reference\OrganizationTypeRepository;

/**
 * Class OrganizationTypeController.
 */
class OrganizationTypeController extends Controller
{
    /**
     * @var OrganizationTypeRepository
     */
    private $repository;

    /**
     * OrganizationTypeController constructor.
     *
     * @param OrganizationTypeRepository $repository
     */
    public function __construct(OrganizationTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the OrganizationType.
     *
     * @param ManageReferenceRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageReferenceRequest $request)
    {
        return view('backend.lookup.organization_type.index')
            ->with('organizationTypes', $this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new OrganizationType.
     *
     * @param ManageReferenceRequest $request
     *
     * @return mixed
     */
    public function create(ManageReferenceRequest $request)
    {
        return view('backend.lookup.organization_type.create');
    }

    /**
     * Store a newly created OrganizationType in storage.
     *
     * @param OrganizationTypeRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(OrganizationTypeRequest $request)
    {
        $this->repository->create($request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.organization_type.index')
            ->withFlashSuccess(__('Organization Type created successfully'));
    }

    /**
     * Show the form for editing the specified OrganizationType.
     *
     * @param ManageReferenceRequest $request
     * @param int                 $id
     *
     * @return mixed
     */
    public function edit(ManageReferenceRequest $request, $id)
    {
        $organization_type = $this->repository->getById($id);

        return view('backend.lookup.organization_type.edit')
            ->with('organizationType', $organization_type);
    }

    /**
     * Update the specified OrganizationType in storage.
     *
     * @param OrganizationTypeRequest $request
     * @param int             $id
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(OrganizationTypeRequest $request, $id)
    {
        $this->repository->updateById($id, $request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.organization_type.index')
            ->withFlashSuccess(__('Organization Type updated successfully'));
    }

    /**
     * Remove the specified OrganizationType from storage.
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

        return redirect()->route('admin.lookup.organization_type.index')
            ->withFlashSuccess('Organization Type deleted successfully');
    }
}
