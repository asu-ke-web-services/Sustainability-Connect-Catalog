<?php

namespace SCCatalog\Http\Controllers\Backend\Auth\User;

use SCCatalog\Models\Auth\User;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Auth\User\ManageUserRequest;

/**
 * Class UserSessionController.
 */
class UserSessionController extends Controller
{
    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function clearSession(ManageUserRequest $request, User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.users.cant_delete_own_session'));
        }

        $user->update(['to_be_logged_out' => true]);

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.session_cleared'));
    }
}
