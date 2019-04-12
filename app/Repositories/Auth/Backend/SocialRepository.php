<?php

namespace SCCatalog\Repositories\Auth\Backend;

use SCCatalog\Models\Auth\User;
use SCCatalog\Models\Auth\SocialAccount;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Events\Backend\Auth\User\UserSocialDeleted;

/**
 * Class SocialRepository.
 */
class SocialRepository
{
    /**
     * @param User        $user
     * @param SocialAccount $social
     *
     * @return bool
     * @throws GeneralException
     */
    public function delete(User $user, SocialAccount $social)
    {
        if ($user->providers()->whereId($social->id)->delete()) {
            event(new UserSocialDeleted($user, $social));

            return true;
        }

        throw new GeneralException(__('exceptions.backend.access.users.social_delete_error'));
    }
}
