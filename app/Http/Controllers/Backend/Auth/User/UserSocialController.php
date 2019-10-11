<?php

namespace SCCatalog\Http\Controllers\Backend\Auth\User;

use SCCatalog\Models\Auth\User;
use SCCatalog\Models\Auth\SocialAccount;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Auth\User\ManageUserRequest;
use SCCatalog\Repositories\Backend\Access\User\SocialRepository;

/**
 * Class UserSocialController.
 */
class UserSocialController extends Controller
{
    /**
     * @param ManageUserRequest $request
     * @param SocialRepository  $socialRepository
     * @param User              $user
     * @param SocialAccount     $social
     *
     * @throws \SCCatalog\Exceptions\GeneralException
     * @return mixed
     */
    public function unlink(ManageUserRequest $request, SocialRepository $socialRepository, User $user, SocialAccount $social)
    {
        $socialRepository->delete($user, $social);

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.social_deleted'));
    }
}
