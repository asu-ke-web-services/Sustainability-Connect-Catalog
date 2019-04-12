<?php

namespace SCCatalog\Http\Controllers\Backend\Lookup;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Lookup\OpportunityReviewStatusRequest;
use SCCatalog\Http\Requests\Backend\Lookup\ManageLookupRequest;
use SCCatalog\Repositories\Lookup\OpportunityReviewStatusRepository;
use SCCatalog\Repositories\Lookup\OpportunityTypeRepository;

/**
 * Class OpportunityReviewStatusController.
 */
class OpportunityReviewStatusController extends Controller
{
    /**
     * @var OpportunityReviewStatusRepository
     */
    private $repository;

    /**
     * OpportunityReviewStatusController constructor.
     *
     * @param OpportunityReviewStatusRepository $repository
     */
    public function __construct(OpportunityReviewStatusRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the OpportunityReviewStatus.
     *
     * @param ManageLookupRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageLookupRequest $request)
    {
        return view('backend.lookup.opportunity_review_status.index')
            ->with('opportunityReviewStatuses', $this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new OpportunityReviewStatus.
     *
     * @param ManageLookupRequest $request
     *
     * @return mixed
     */
    public function create(ManageLookupRequest $request, OpportunityTypeRepository $opportunityTypeRepository)
    {
        return view('backend.lookup.opportunity_review_status.create')
            ->withTypes($opportunityTypeRepository->get(['id', 'name', 'order'])->pluck('name', 'id')->toArray());
    }

    /**
     * Store a newly created OpportunityReviewStatus in storage.
     *
     * @param OpportunityReviewStatusRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(OpportunityReviewStatusRequest $request)
    {
        $this->repository->create($request->only(
            'opportunity_type_id',
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.opportunity_review_status.index')
            ->withFlashSuccess(__('Opportunity Review Status created successfully'));
    }

    /**
     * Show the form for editing the specified OpportunityReviewStatus.
     *
     * @param ManageLookupRequest $request
     * @param int                 $id
     *
     * @return mixed
     */
    public function edit(ManageLookupRequest $request, OpportunityTypeRepository $opportunityTypeRepository, $id)
    {
        $opportunity_review_status = $this->repository->getById($id);

        return view('backend.lookup.opportunity_review_status.edit')
            ->with('opportunityReviewStatus', $opportunity_review_status)
            ->withTypes($opportunityTypeRepository->get(['id', 'name', 'order'])->pluck('name', 'id')->toArray());
    }

    /**
     * Update the specified OpportunityReviewStatus in storage.
     *
     * @param OpportunityReviewStatusRequest $request
     * @param int             $id
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(OpportunityReviewStatusRequest $request, $id)
    {
        $this->repository->updateById($id, $request->only(
            'opportunity_type_id',
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.opportunity_review_status.index')
            ->withFlashSuccess(__('Opportunity Review Status updated successfully'));
    }

    /**
     * Remove the specified OpportunityReviewStatus from storage.
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

        return redirect()->route('admin.lookup.opportunity_review_status.index')
            ->withFlashSuccess('Opportunity Review Status deleted successfully');
    }
}
