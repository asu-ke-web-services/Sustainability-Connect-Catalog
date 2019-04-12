<?php

namespace SCCatalog\Http\Controllers\Backend\Lookup;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Lookup\AffiliationRequest;
use SCCatalog\Http\Requests\Backend\Lookup\ManageLookupRequest;
use SCCatalog\Repositories\Lookup\AffiliationRepository;
use SCCatalog\Repositories\Lookup\OpportunityTypeRepository;

/**
 * Class AffiliationController.
 */
class AffiliationController extends Controller
{
    /**
     * @var AffiliationRepository
     */
    private $repository;

    /**
     * AffiliationController constructor.
     *
     * @param AffiliationRepository $repository
     */
    public function __construct(AffiliationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the Affiliation.
     *
     * @param ManageLookupRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageLookupRequest $request)
    {
        return view('backend.lookup.affiliation.index')
            ->withAffiliations($this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new Affiliation.
     *
     * @param ManageLookupRequest       $request
     * @param OpportunityTypeRepository $opportunityTypeRepository
     *
     * @return mixed
     */
    public function create(ManageLookupRequest $request, OpportunityTypeRepository $opportunityTypeRepository)
    {
        return view('backend.lookup.affiliation.create')
            ->withTypes($opportunityTypeRepository->get(['id', 'name', 'order'])->pluck('name', 'id')->toArray());
    }

    /**
     * Store a newly created Affiliation in storage.
     *
     * @param AffiliationRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(AffiliationRequest $request)
    {
        $this->repository->create($request->only(
            'opportunity_type_id',
            'order',
            'name',
            'access_control'
        ));

        return redirect()->route('admin.lookup.affiliation.index')
            ->withFlashSuccess(__('Affiliation created successfully'));
    }

    /**
     * Show the form for editing the specified Affiliation.
     *
     * @param ManageLookupRequest $request
     * @param OpportunityTypeRepository $opportunityTypeRepository
     * @param int $id
     *
     * @return mixed
     */
    public function edit(ManageLookupRequest $request, OpportunityTypeRepository $opportunityTypeRepository, $id)
    {
        $affiliation = $this->repository->getById($id);

        return view('backend.lookup.affiliation.edit')
            ->withAffiliation($affiliation)
            ->withTypes($opportunityTypeRepository->get(['id', 'name', 'order'])->pluck('name', 'id')->toArray());
    }

    /**
     * Update the specified Affiliation in storage.
     *
     * @param AffiliationRequest $request
     * @param int             $id
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(AffiliationRequest $request, $id)
    {
        $this->repository->updateById($id, $request->only(
            'opportunity_type_id',
            'order',
            'name',
            'access_control'
        ));

        return redirect()->route('admin.lookup.affiliation.index')
            ->withFlashSuccess(__('Affiliation updated successfully'));
    }

    /**
     * Remove the specified Affiliation from storage.
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

        return redirect()->route('admin.lookup.affiliation.index')
            ->withFlashSuccess('Affiliation deleted successfully');
    }
}
