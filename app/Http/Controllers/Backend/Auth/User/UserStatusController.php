<?php

namespace SCCatalog\Http\Controllers\Backend\Auth\User;

use SCCatalog\Models\Auth\User;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Repositories\Auth\Backend\UserRepository;
use SCCatalog\Http\Requests\Backend\Auth\User\ManageUserRequest;

/**
 * Class UserStatusController.
 */
class UserStatusController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getActivePaginated(ManageUserRequest $request)
    {
        return view('backend.auth.user.active')
            ->withUsers($this->userRepository->getActivePaginated(25, 'created_at', 'desc'));
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function getDeactivated(ManageUserRequest $request)
    {
        return view('backend.auth.user.deactivated')
            ->withUsers($this->userRepository->getInactivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageUserRequest $request)
    {
        return view('backend.auth.user.deleted')
            ->withUsers($this->userRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     * @param                   $status
     *
     * @throws \SCCatalog\Exceptions\GeneralException
     * @return mixed
     */
    public function mark(ManageUserRequest $request, User $user, $status)
    {
        $this->userRepository->mark($user, (int) $status);

        return redirect()->route(
            (int) $status === 1 ?
            'admin.auth.user.index' :
            'admin.auth.user.deactivated'
        )->withFlashSuccess(__('alerts.backend.users.updated'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $deletedUser
     *
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function delete(ManageUserRequest $request, User $deletedUser)
    {
        $this->userRepository->forceDelete($deletedUser);

        return redirect()->route('admin.auth.user.deleted')->withFlashSuccess(__('alerts.backend.users.deleted_permanently'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $deletedUser
     *
     * @throws \SCCatalog\Exceptions\GeneralException
     * @return mixed
     */
    public function restore(ManageUserRequest $request, User $deletedUser)
    {
        $this->userRepository->restore($deletedUser);

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.restored'));
    }
}
