<?php

namespace SCCatalog\Http\Controllers\Backend\Reference;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Reference\AttachmentTypeRequest;
use SCCatalog\Http\Requests\Backend\Reference\ManageReferenceRequest;
use SCCatalog\Repositories\Reference\AttachmentTypeRepository;

/**
 * Class AttachmentTypeController.
 */
class AttachmentTypeController extends Controller
{
    /**
     * @var AttachmentTypeRepository
     */
    private $repository;

    /**
     * AttachmentTypeController constructor.
     *
     * @param AttachmentTypeRepository $repository
     */
    public function __construct(AttachmentTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the AttachmentType.
     *
     * @param ManageReferenceRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageReferenceRequest $request)
    {
        return view('backend.lookup.attachment_type.index')
            ->with('attachmentTypes', $this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new AttachmentType.
     *
     * @param ManageReferenceRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function create(ManageReferenceRequest $request)
    {
        return view('backend.lookup.attachment_type.create');
    }

    /**
     * Store a newly created AttachmentType in storage.
     *
     * @param AttachmentTypeRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(AttachmentTypeRequest $request)
    {
        $this->repository->create($request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.attachment_type.index')
            ->withFlashSuccess(__('Attachment Type created successfully'));
    }

    /**
     * Show the form for editing the specified AttachmentType.
     *
     * @param ManageReferenceRequest $request
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit(ManageReferenceRequest $request, $id)
    {
        $attachment_type = $this->repository->getById($id);

        return view('backend.lookup.attachment_type.edit')
            ->with('attachmentType', $attachment_type);
    }

    /**
     * Update the specified AttachmentType in storage.
     *
     * @param  int                 $id
     * @param AttachmentTypeRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function update(AttachmentTypeRequest $request, $id)
    {
        $this->repository->updateById($id, $request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.attachment_type.index')
            ->withFlashSuccess(__('Attachment Type updated successfully'));
    }

    /**
     * Remove the specified AttachmentType from storage.
     *
     * @param ManageReferenceRequest $request
     * @param $id
     * @return \Illuminate\View\View
     * @throws \Exception
     */
    public function destroy(ManageReferenceRequest $request, $id)
    {
        $this->repository->deleteById($id);

        return redirect()->route('admin.lookup.attachment_type.index')
            ->withFlashSuccess('Attachment Type deleted successfully');
    }
}
