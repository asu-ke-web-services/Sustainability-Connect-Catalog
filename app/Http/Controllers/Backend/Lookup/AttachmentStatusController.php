<?php

namespace SCCatalog\Http\Controllers\Backend\Lookup;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Lookup\AttachmentStatusRequest;
use SCCatalog\Http\Requests\Backend\Lookup\ManageLookupRequest;
use SCCatalog\Repositories\Lookup\AttachmentStatusRepository;

/**
 * Class AttachmentStatusController.
 */
class AttachmentStatusController extends Controller
{
    /**
     * @var AttachmentStatusRepository
     */
    private $repository;

    /**
     * AttachmentStatusController constructor.
     *
     * @param AttachmentStatusRepository $repository
     */
    public function __construct(AttachmentStatusRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the AttachmentStatus.
     *
     * @param ManageLookupRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageLookupRequest $request)
    {
        return view('backend.lookup.attachment_status.index')
            ->with('attachmentStatus', $this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new AttachmentStatus.
     *
     * @param ManageLookupRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function create(ManageLookupRequest $request)
    {
        return view('backend.lookup.attachment_status.create');
    }

    /**
     * Store a newly created AttachmentStatus in storage.
     *
     * @param AttachmentStatusRepository $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(AttachmentStatusRepository $request)
    {
        $this->repository->create($request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.attachment_status.index')
            ->withFlashSuccess(__('Attachment Status created successfully'));
    }

    /**
     * Show the form for editing the specified AttachmentStatus.
     *
     * @param ManageLookupRequest $request
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit(ManageLookupRequest $request, $id)
    {
        $attachment_status = $this->repository->getById($id);

        return view('backend.lookup.attachment_status.edit')
            ->with('attachmentStatus', $attachment_status);
    }

    /**
     * Update the specified AttachmentStatus in storage.
     *
     * @param  int                 $id
     * @param AttachmentStatusRepository $request
     *
     * @return \Illuminate\View\View
     */
    public function update(AttachmentStatusRepository $request, $id)
    {
        $this->repository->updateById($id, $request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.attachment_status.index')
            ->withFlashSuccess(__('Attachment Status updated successfully'));
    }

    /**
     * Remove the specified AttachmentStatus from storage.
     *
     * @param ManageLookupRequest $request
     * @param $id
     * @return \Illuminate\View\View
     * @throws \Exception
     */
    public function destroy(ManageLookupRequest $request, $id)
    {
        $this->repository->deleteById($id);

        return redirect()->route('admin.lookup.attachment_status.index')
            ->withFlashSuccess('Attachment Status deleted successfully');
    }
}
