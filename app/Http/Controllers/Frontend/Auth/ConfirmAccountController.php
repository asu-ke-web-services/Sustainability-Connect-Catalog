<?php

namespace SCCatalog\Http\Controllers\Frontend\Auth;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Repositories\Frontend\Auth\UserRepository;
use SCCatalog\Notifications\Frontend\Auth\UserNeedsConfirmation;

/**
 * Class ConfirmAccountController.
 */
class ConfirmAccountController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ConfirmAccountController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param $token
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     */
    public function confirm($token)
    {
        $this->user->confirm($token);

        return redirect()->route('frontend.auth.login')->withFlashSuccess(__('exceptions.frontend.auth.confirmation.success'));
    }

    /**
     * @param $uuid
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     */
    public function sendConfirmationEmail($uuid)
    {
        $user = $this->user->findByUuid($uuid);

        if ($user->isConfirmed()) {
            return redirect()->route('frontend.auth.login')->withFlashSuccess(__('exceptions.frontend.auth.confirmation.already_confirmed'));
        }

        $user->notify(new UserNeedsConfirmation($user->confirmation_code));

        return redirect()->route('frontend.auth.login')->withFlashSuccess(__('exceptions.frontend.auth.confirmation.resent'));
    }
}
