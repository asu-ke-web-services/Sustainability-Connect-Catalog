<?php

namespace SCCatalog\Http\Controllers\Backend\Lookup;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Lookup\OpportunityTypeRequest;
use SCCatalog\Http\Requests\Backend\Lookup\ManageLookupRequest;
use SCCatalog\Repositories\Backend\Lookup\OpportunityTypeRepository;

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
     * @param ManageLookupRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageLookupRequest $request)
    {
        return view('backend.lookup.opportunity_type.index')
            ->with('opportunity_types', $this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new OpportunityType.
     *
     * @param ManageLookupRequest $request
     *
     * @return mixed
     */
    public function create(ManageLookupRequest $request)
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
     * @param ManageLookupRequest $request
     * @param int                 $id
     *
     * @return mixed
     */
    public function edit(ManageLookupRequest $request, $id)
    {
        $opportunity_type = $this->repository->getById($id);

        return view('backend.lookup.opportunity_type.edit')
            ->with('opportunity_type', $opportunity_type);
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
     * @param ManageLookupRequest $request
     * @param int                 $id
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageLookupRequest $request, $id)
    {
        $this->repository->deleteById($id);

        return redirect()->route('admin.lookup.opportunity_type.index')
            ->withFlashSuccess('Opportunity Type deleted successfully');
    }
}
