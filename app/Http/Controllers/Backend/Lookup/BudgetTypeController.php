<?php

namespace SCCatalog\Http\Controllers\Backend\Lookup;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Lookup\BudgetTypeRequest;
use SCCatalog\Http\Requests\Backend\Lookup\ManageLookupRequest;
use SCCatalog\Repositories\Backend\Lookup\BudgetTypeRepository;

/**
 * Class BudgetTypeController.
 */
class BudgetTypeController extends Controller
{
    /**
     * @var BudgetTypeRepository
     */
    private $repository;

    /**
     * BudgetTypeController constructor.
     *
     * @param BudgetTypeRepository $repository
     */
    public function __construct(BudgetTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the BudgetType.
     *
     * @param ManageLookupRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageLookupRequest $request)
    {
        return view('backend.lookup.budget_type.index')
            ->with('budgetTypes', $this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new BudgetType.
     *
     * @param ManageLookupRequest $request
     *
     * @return mixed
     */
    public function create(ManageLookupRequest $request)
    {
        return view('backend.lookup.budget_type.create');
    }

    /**
     * Store a newly created BudgetType in storage.
     *
     * @param BudgetTypeRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(BudgetTypeRequest $request)
    {
        $this->repository->create($request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.budget_type.index')
            ->withFlashSuccess(__('Budget Type created successfully'));
    }

    /**
     * Show the form for editing the specified BudgetType.
     *
     * @param ManageLookupRequest $request
     * @param int                 $id
     *
     * @return mixed
     */
    public function edit(ManageLookupRequest $request, $id)
    {
        $budget_type = $this->repository->getById($id);

        return view('backend.lookup.budget_type.edit')
            ->with('budgetType', $budget_type);
    }

    /**
     * Update the specified BudgetType in storage.
     *
     * @param BudgetTypeRequest $request
     * @param int             $id
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(BudgetTypeRequest $request, $id)
    {
        $this->repository->updateById($id, $request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.budget_type.index')
            ->withFlashSuccess(__('Budget Type updated successfully'));
    }

    /**
     * Remove the specified BudgetType from storage.
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

        return redirect()->route('admin.lookup.budget_type.index')
            ->withFlashSuccess('Budget Type deleted successfully');
    }
}
