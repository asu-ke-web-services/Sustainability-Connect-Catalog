<?php

namespace SCCatalog\Http\Controllers\Frontend\Auth;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Repositories\Frontend\Auth\UserRepository;
use SCCatalog\Http\Requests\Frontend\User\UpdatePasswordRequest;

/**
 * Class PasswordExpiredController.
 */
class PasswordExpiredController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function expired()
    {
        abort_unless(config('access.users.password_expires_days'), 404);

        return view('frontend.auth.passwords.expired');
    }

    /**
     * @param UpdatePasswordRequest $request
     * @param UserRepository        $userRepository
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     */
    public function update(UpdatePasswordRequest $request, UserRepository $userRepository)
    {
        abort_unless(config('access.users.password_expires_days'), 404);

        $userRepository->updatePassword($request->only('old_password', 'password'), true);

        return redirect()->route('frontend.user.account')
            ->withFlashSuccess(__('strings.frontend.user.password_updated'));
    }
}
