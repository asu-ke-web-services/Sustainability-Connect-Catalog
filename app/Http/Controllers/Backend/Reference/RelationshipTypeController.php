<?php

namespace SCCatalog\Http\Controllers\Backend\Reference;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Reference\RelationshipTypeRequest;
use SCCatalog\Http\Requests\Backend\Reference\ManageReferenceRequest;
use SCCatalog\Repositories\Reference\RelationshipTypeRepository;

/**
 * Class RelationshipTypeController.
 */
class RelationshipTypeController extends Controller
{
    /**
     * @var RelationshipTypeRepository
     */
    private $repository;

    /**
     * RelationshipTypeController constructor.
     *
     * @param RelationshipTypeRepository $repository
     */
    public function __construct(RelationshipTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the RelationshipType.
     *
     * @param ManageReferenceRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageReferenceRequest $request)
    {
        return view('backend.lookup.relationship_type.index')
            ->with('relationshipTypes', $this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new RelationshipType.
     *
     * @param ManageReferenceRequest $request
     *
     * @return mixed
     */
    public function create(ManageReferenceRequest $request)
    {
        return view('backend.lookup.relationship_type.create');
    }

    /**
     * Store a newly created RelationshipType in storage.
     *
     * @param RelationshipTypeRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(RelationshipTypeRequest $request)
    {
        $this->repository->create($request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.relationship_type.index')
            ->withFlashSuccess(__('Relationship Type created successfully'));
    }

    /**
     * Show the form for editing the specified RelationshipType.
     *
     * @param ManageReferenceRequest $request
     * @param int                 $id
     *
     * @return mixed
     */
    public function edit(ManageReferenceRequest $request, $id)
    {
        $relationship_type = $this->repository->getById($id);

        return view('backend.lookup.relationship_type.edit')
            ->with('relationshipType', $relationship_type);
    }

    /**
     * Update the specified RelationshipType in storage.
     *
     * @param RelationshipTypeRequest $request
     * @param int             $id
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(RelationshipTypeRequest $request, $id)
    {
        $this->repository->updateById($id, $request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.relationship_type.index')
            ->withFlashSuccess(__('Relationship Type updated successfully'));
    }

    /**
     * Remove the specified RelationshipType from storage.
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

        return redirect()->route('admin.lookup.relationship_type.index')
            ->withFlashSuccess('Relationship Type deleted successfully');
    }
}
