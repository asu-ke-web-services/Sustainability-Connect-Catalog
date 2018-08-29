<?php

namespace SCCatalog\Http\Controllers\Backend\Auth\User;

use SCCatalog\Models\Auth\User;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Repositories\Backend\Auth\SessionRepository;
use SCCatalog\Http\Requests\Backend\Auth\User\ManageUserRequest;

/**
 * Class UserSessionController.
 */
class UserSessionController extends Controller
{
    /**
     * @param ManageUserRequest $request
     * @param SessionRepository $sessionRepository
     * @param User              $user
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     */
    public function clearSession(ManageUserRequest $request, SessionRepository $sessionRepository, User $user)
    {
        $sessionRepository->clearSession($user);

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.session_cleared'));
    }
}
