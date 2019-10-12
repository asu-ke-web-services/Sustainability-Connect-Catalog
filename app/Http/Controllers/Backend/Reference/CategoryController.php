<?php

namespace SCCatalog\Http\Controllers\Backend\Reference;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Reference\CategoryRequest;
use SCCatalog\Http\Requests\Backend\Reference\ManageReferenceRequest;
use SCCatalog\Repositories\Reference\CategoryRepository;

/**
 * Class CategoryController.
 */
class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $repository;

    /**
     * CategoryController constructor.
     *
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the Category.
     *
     * @param ManageReferenceRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageReferenceRequest $request)
    {
        return view('backend.lookup.category.index')
            ->withCategories($this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new Category.
     *
     * @param ManageReferenceRequest $request
     *
     * @return mixed
     */
    public function create(ManageReferenceRequest $request)
    {
        return view('backend.lookup.category.create');
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CategoryRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(CategoryRequest $request)
    {
        $this->repository->create($request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.category.index')
            ->withFlashSuccess(__('Category created successfully'));
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param ManageReferenceRequest $request
     * @param int                 $id
     *
     * @return mixed
     */
    public function edit(ManageReferenceRequest $request, $id)
    {
        $category = $this->repository->getById($id);

        return view('backend.lookup.category.edit')
            ->withCategory($category);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param CategoryRequest $request
     * @param int             $id
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->repository->updateById($id, $request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.category.index')
            ->withFlashSuccess(__('Category updated successfully'));
    }

    /**
     * Remove the specified Category from storage.
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

        return redirect()->route('admin.lookup.category.index')
            ->withFlashSuccess('Category deleted successfully');
    }
}
