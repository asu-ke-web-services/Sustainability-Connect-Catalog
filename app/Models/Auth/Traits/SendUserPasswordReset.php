<?php

namespace SCCatalog\Models\Auth\Traits;

use SCCatalog\Notifications\Frontend\Auth\UserNeedsPasswordReset;

/**
 * Class SendUserPasswordReset.
 */
trait SendUserPasswordReset
{
    /**
     * Send the password reset notification.
     *
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserNeedsPasswordReset($token));
    }
}
