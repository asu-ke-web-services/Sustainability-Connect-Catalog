<?php

namespace SCCatalog\Http\Controllers\Backend\Lookup;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Lookup\OpportunityStatusRequest;
use SCCatalog\Http\Requests\Backend\Lookup\ManageLookupRequest;
use SCCatalog\Repositories\Lookup\OpportunityStatusRepository;
use SCCatalog\Repositories\Lookup\OpportunityTypeRepository;

/**
 * Class OpportunityStatusController.
 */
class OpportunityStatusController extends Controller
{
    /**
     * @var OpportunityStatusRepository
     */
    private $repository;

    /**
     * OpportunityStatusController constructor.
     *
     * @param OpportunityStatusRepository $repository
     */
    public function __construct(OpportunityStatusRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the OpportunityStatus.
     *
     * @param ManageLookupRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageLookupRequest $request)
    {
        return view('backend.lookup.opportunity_status.index')
            ->with('opportunityStatuses', $this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new OpportunityStatus.
     *
     * @param ManageLookupRequest $request
     *
     * @return mixed
     */
    public function create(ManageLookupRequest $request, OpportunityTypeRepository $opportunityTypeRepository)
    {
        return view('backend.lookup.opportunity_status.create')
            ->withTypes($opportunityTypeRepository->get(['id', 'name', 'order'])->pluck('name', 'id')->toArray());
    }

    /**
     * Store a newly created OpportunityStatus in storage.
     *
     * @param OpportunityStatusRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(OpportunityStatusRequest $request)
    {
        $this->repository->create($request->only(
            'opportunity_type_id',
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.opportunity_status.index')
            ->withFlashSuccess(__('Opportunity Status created successfully'));
    }

    /**
     * Show the form for editing the specified OpportunityStatus.
     *
     * @param ManageLookupRequest $request
     * @param int                 $id
     *
     * @return mixed
     */
    public function edit(ManageLookupRequest $request, OpportunityTypeRepository $opportunityTypeRepository, $id)
    {
        $opportunity_status = $this->repository->getById($id);

        return view('backend.lookup.opportunity_status.edit')
            ->with('opportunityStatus', $opportunity_status)
            ->withTypes($opportunityTypeRepository->get(['id', 'name', 'order'])->pluck('name', 'id')->toArray());
    }

    /**
     * Update the specified OpportunityStatus in storage.
     *
     * @param OpportunityStatusRequest $request
     * @param int             $id
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(OpportunityStatusRequest $request, $id)
    {
        $this->repository->updateById($id, $request->only(
            'opportunity_type_id',
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.opportunity_status.index')
            ->withFlashSuccess(__('Opportunity Status updated successfully'));
    }

    /**
     * Remove the specified OpportunityStatus from storage.
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

        return redirect()->route('admin.lookup.opportunity_status.index')
            ->withFlashSuccess('Opportunity Status deleted successfully');
    }
}
