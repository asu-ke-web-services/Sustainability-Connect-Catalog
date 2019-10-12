<?php

namespace SCCatalog\Http\Controllers\Backend\Reference;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Reference\KeywordRequest;
use SCCatalog\Http\Requests\Backend\Reference\ManageReferenceRequest;
use SCCatalog\Repositories\Reference\KeywordRepository;

/**
 * Class KeywordController.
 */
class KeywordController extends Controller
{
    /**
     * @var KeywordRepository
     */
    private $repository;

    /**
     * KeywordController constructor.
     *
     * @param KeywordRepository $repository
     */
    public function __construct(KeywordRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the Keyword.
     *
     * @param ManageReferenceRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageReferenceRequest $request)
    {
        return view('backend.lookup.keyword.index')
            ->withKeywords($this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new Keyword.
     *
     * @param ManageReferenceRequest $request
     *
     * @return mixed
     */
    public function create(ManageReferenceRequest $request)
    {
        return view('backend.lookup.keyword.create');
    }

    /**
     * Store a newly created Keyword in storage.
     *
     * @param KeywordRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(KeywordRequest $request)
    {
        $this->repository->create($request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.keyword.index')
            ->withFlashSuccess(__('Keyword created successfully'));
    }

    /**
     * Show the form for editing the specified Keyword.
     *
     * @param ManageReferenceRequest $request
     * @param int                 $id
     *
     * @return mixed
     */
    public function edit(ManageReferenceRequest $request, $id)
    {
        $keyword = $this->repository->getById($id);

        return view('backend.lookup.keyword.edit')
            ->withKeyword($keyword);
    }

    /**
     * Update the specified Keyword in storage.
     *
     * @param KeywordRequest $request
     * @param int             $id
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(KeywordRequest $request, $id)
    {
        $this->repository->updateById($id, $request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.keyword.index')
            ->withFlashSuccess(__('Keyword updated successfully'));
    }

    /**
     * Remove the specified Keyword from storage.
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

        return redirect()->route('admin.lookup.keyword.index')
            ->withFlashSuccess('Keyword deleted successfully');
    }
}
