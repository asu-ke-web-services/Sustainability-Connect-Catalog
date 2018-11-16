<?php

namespace SCCatalog\Http\Controllers\Backend\Organization;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Organization\ManageOrganizationRequest;
use SCCatalog\Models\Organization\Organization;
use SCCatalog\Repositories\Backend\Lookup\OrganizationStatusRepository;
use SCCatalog\Repositories\Backend\Lookup\OrganizationTypeRepository;
use SCCatalog\Repositories\Backend\Organization\OrganizationRepository;

/**
 * Class OrganizationController.
 */
class OrganizationController extends Controller
{
    /**
     * @var OrganizationRepository
     */
    private $organizationRepository;

    /**
     * OrganizationController constructor.
     *
     * @param OrganizationRepository $organizationRepository
     */
    public function __construct(OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
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
        $search = '';
        if($request->has('search')){
            $search = $request->get('search');
        }

        return view('backend.organization.all')
            ->with('organizations', $this->organizationRepository->getAllPaginated(25, $search, 'updated_at', 'desc'))
            ->with('searchRequest', (object) array('search' => $search));
    }

    /**
     * Show the form for creating a new Organization.
     *
     * @param ManageOrganizationRequest $request
     *
     * @param OrganizationStatusRepository $organizationStatusRepository
     * @param OrganizationTypeRepository $organizationTypeRepository
     * @return mixed
     */
    public function create(
            ManageOrganizationRequest $request,
            OrganizationStatusRepository $organizationStatusRepository,
            OrganizationTypeRepository $organizationTypeRepository
    )
    {
        return view('backend.organization.create')
            ->with('organizationTypes', $organizationTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizationStatuses', $organizationStatusRepository->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * Store a newly created Organization in storage.
     *
     * @param ManageOrganizationRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(ManageOrganizationRequest $request)
    {
        $this->organizationRepository->create($request->all());

        return redirect()->route('admin.organization.index')
            ->withFlashSuccess(__('Organization created successfully'));
    }

    /**
     * Show the form for editing the specified Organization.
     *
     * @param ManageOrganizationRequest    $request
     * @param OrganizationStatusRepository $organizationStatusRepository
     * @param OrganizationTypeRepository   $organizationTypeRepository
     * @param Organization                 $organization
     * @return mixed
     */
    public function edit(
            ManageOrganizationRequest $request,
            OrganizationStatusRepository $organizationStatusRepository,
            OrganizationTypeRepository $organizationTypeRepository,
            Organization $organization
    )
    {
        return view('backend.organization.edit')
            ->withOrganization($organization)
            ->with('organizationTypes', $organizationTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizationStatuses', $organizationStatusRepository->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * Display the specified Organization.
     *
     * @param ManageOrganizationRequest $request
     * @param Organization              $organization
     * @return \Illuminate\View\View
     */
    public function show(ManageOrganizationRequest $request, Organization $organization)
    {
        return view('backend.organization.show')
            ->withOrganization($organization);
    }

    /**
     * Update the specified Organization in storage.
     *
     * @param ManageOrganizationRequest $request
     * @param Organization              $organization
     * @return mixed
     */
    public function update(ManageOrganizationRequest $request, Organization $organization)
    {
        $this->organizationRepository->updateById($organization->id, $request->all());

        return redirect()->route('admin.organization.index')
            ->withFlashSuccess(__('Organization updated successfully'));
    }

    /**
     * Remove the specified Organization from storage.
     *
     * @param ManageOrganizationRequest $request
     * @param Organization              $organization
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageOrganizationRequest $request, Organization $organization)
    {
        $this->organizationRepository->deleteById($organization->id);

        return redirect()->route('admin.organization.index')
            ->withFlashSuccess('Organization deleted successfully');
    }
}
