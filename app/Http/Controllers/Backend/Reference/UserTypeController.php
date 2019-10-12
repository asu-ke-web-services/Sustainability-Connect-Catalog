<?php

namespace SCCatalog\Http\Controllers\Backend\Reference;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Reference\UserTypeRequest;
use SCCatalog\Http\Requests\Backend\Reference\ManageReferenceRequest;
use SCCatalog\Repositories\Reference\UserTypeRepository;

/**
 * Class UserTypeController.
 */
class UserTypeController extends Controller
{
    /**
     * @var UserTypeRepository
     */
    private $repository;

    /**
     * UserTypeController constructor.
     *
     * @param UserTypeRepository $repository
     */
    public function __construct(UserTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the UserType.
     *
     * @param ManageReferenceRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageReferenceRequest $request)
    {
        return view('backend.lookup.user_type.index')
            ->with('userTypes', $this->repository->paginate(25));
    }

    /**
     * Show the form for creating a new UserType.
     *
     * @param ManageReferenceRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function create(ManageReferenceRequest $request)
    {
        return view('backend.lookup.user_type.create');
    }

    /**
     * Store a newly created UserType in storage.
     *
     * @param UserTypeRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(UserTypeRequest $request)
    {
        $this->repository->create($request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.user_type.index')
            ->withFlashSuccess(__('User Type created successfully'));
    }

    /**
     * Show the form for editing the specified UserType.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(ManageReferenceRequest $request, $id)
    {
        $userType = $this->repository->getById($id);

        return view('backend.lookup.user_type.edit')
            ->with('userType', $userType);
    }

    /**
     * Update the specified UserType in storage.
     *
     * @param  int                 $id
     * @param UserTypeRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function update(UserTypeRequest $request, $id)
    {
        $this->repository->updateById($usertype->id, $request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.user_type.index')
            ->withFlashSuccess(__('User Type updated successfully'));
    }

    /**
     * Remove the specified UserType from storage.
     *
     * @param ManageReferenceRequest $request
     * @param  int $id
     *
     * @return \Illuminate\View\View
     * @throws \Exception
     */
    public function destroy(ManageReferenceRequest $request, $id)
    {
        $this->repository->deleteById($id);

        return redirect()->route('admin.lookup.user_type.index')
            ->withFlashSuccess('User Type deleted successfully');
    }
}
