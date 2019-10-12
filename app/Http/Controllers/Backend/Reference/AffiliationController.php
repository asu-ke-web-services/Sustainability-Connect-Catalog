<?php

namespace SCCatalog\Http\Controllers\Backend\Reference;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Reference\AffiliationRequest;
use SCCatalog\Http\Requests\Backend\Reference\ManageReferenceRequest;
use SCCatalog\Repositories\Reference\AffiliationRepository;
use SCCatalog\Repositories\Reference\OpportunityTypeRepository;

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
     * @param ManageReferenceRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageReferenceRequest $request)
    {
        return view('backend.lookup.affiliation.index')
            ->withAffiliations($this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new Affiliation.
     *
     * @param ManageReferenceRequest       $request
     * @param OpportunityTypeRepository $opportunityTypeRepository
     *
     * @return mixed
     */
    public function create(ManageReferenceRequest $request, OpportunityTypeRepository $opportunityTypeRepository)
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
     * @param ManageReferenceRequest $request
     * @param OpportunityTypeRepository $opportunityTypeRepository
     * @param int $id
     *
     * @return mixed
     */
    public function edit(ManageReferenceRequest $request, OpportunityTypeRepository $opportunityTypeRepository, $id)
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
     * @param ManageReferenceRequest $request
     * @param int                 $id
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageReferenceRequest $request, $id)
    {
        $this->repository->deleteById($id);

        return redirect()->route('admin.lookup.affiliation.index')
            ->withFlashSuccess('Affiliation deleted successfully');
    }
}
