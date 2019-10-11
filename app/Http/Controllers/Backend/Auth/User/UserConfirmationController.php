<?php

namespace SCCatalog\Http\Controllers\Backend\Auth\User;

use SCCatalog\Models\Auth\User;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Repositories\Auth\Backend\UserRepository;
use SCCatalog\Http\Requests\Backend\Auth\User\ManageUserRequest;
use SCCatalog\Notifications\Frontend\Auth\UserNeedsConfirmation;

/**
 * Class UserConfirmationController.
 */
class UserConfirmationController extends Controller
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
     * @param User              $user
     *
     * @return mixed
     */
    public function sendConfirmationEmail(ManageUserRequest $request, User $user)
    {
        // Shouldn't allow users to confirm their own accounts when the application is set to manual confirmation
        if (config('access.users.requires_approval')) {
            return redirect()->back()->withFlashDanger(__('alerts.backend.users.cant_resend_confirmation'));
        }

        if ($user->isConfirmed()) {
            return redirect()->back()->withFlashSuccess(__('exceptions.backend.access.users.already_confirmed'));
        }

        $user->notify(new UserNeedsConfirmation($user->confirmation_code));

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.confirmation_email'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @throws \SCCatalog\Exceptions\GeneralException
     * @return mixed
     */
    public function confirm(ManageUserRequest $request, User $user)
    {
        $this->userRepository->confirm($user);

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.confirmed'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @throws \SCCatalog\Exceptions\GeneralException
     * @return mixed
     */
    public function unconfirm(ManageUserRequest $request, User $user)
    {
        $this->userRepository->unconfirm($user);

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.unconfirmed'));
    }
}
