<?php

namespace SCCatalog\Http\Controllers\Backend\Reference;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Reference\OpportunityTypeRequest;
use SCCatalog\Http\Requests\Backend\Reference\ManageReferenceRequest;
use SCCatalog\Repositories\Reference\OpportunityTypeRepository;

/**
 * Class OpportunityTypeController.
 */
class OpportunityTypeController extends Controller
{
    /**
     * @var OpportunityTypeRepository
     */
    private $repository;

    /**
     * OpportunityTypeController constructor.
     *
     * @param OpportunityTypeRepository $repository
     */
    public function __construct(OpportunityTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the OpportunityType.
     *
     * @param ManageReferenceRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageReferenceRequest $request)
    {
        return view('backend.lookup.opportunity_type.index')
            ->with('opportunityTypes', $this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new OpportunityType.
     *
     * @param ManageReferenceRequest $request
     *
     * @return mixed
     */
    public function create(ManageReferenceRequest $request)
    {
        return view('backend.lookup.opportunity_type.create');
    }

    /**
     * Store a newly created OpportunityType in storage.
     *
     * @param OpportunityTypeRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(OpportunityTypeRequest $request)
    {
        $this->repository->create($request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.opportunity_type.index')
            ->withFlashSuccess(__('Opportunity Type created successfully'));
    }

    /**
     * Show the form for editing the specified OpportunityType.
     *
     * @param ManageReferenceRequest $request
     * @param int                 $id
     *
     * @return mixed
     */
    public function edit(ManageReferenceRequest $request, $id)
    {
        $opportunity_type = $this->repository->getById($id);

        return view('backend.lookup.opportunity_type.edit')
            ->with('opportunityType', $opportunity_type);
    }

    /**
     * Update the specified OpportunityType in storage.
     *
     * @param OpportunityTypeRequest $request
     * @param int             $id
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(OpportunityTypeRequest $request, $id)
    {
        $this->repository->updateById($id, $request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.opportunity_type.index')
            ->withFlashSuccess(__('Opportunity Type updated successfully'));
    }

    /**
     * Remove the specified OpportunityType from storage.
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

        return redirect()->route('admin.lookup.opportunity_type.index')
            ->withFlashSuccess('Opportunity Type deleted successfully');
    }
}
