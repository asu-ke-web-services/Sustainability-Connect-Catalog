<?php

namespace SCCatalog\Listeners\Backend\Auth\User;

use SCCatalog\Events\Backend\Auth\User\UserCreated;
use SCCatalog\Events\Backend\Auth\User\UserDeleted;
use SCCatalog\Events\Backend\Auth\User\UserUpdated;
use SCCatalog\Events\Backend\Auth\User\UserRestored;
use SCCatalog\Events\Backend\Auth\User\UserConfirmed;
use SCCatalog\Events\Backend\Auth\User\UserDeactivated;
use SCCatalog\Events\Backend\Auth\User\UserReactivated;
use SCCatalog\Events\Backend\Auth\User\UserUnconfirmed;
use SCCatalog\Events\Backend\Auth\User\UserSocialDeleted;
use SCCatalog\Events\Backend\Auth\User\UserPasswordChanged;
use SCCatalog\Events\Backend\Auth\User\UserPermanentlyDeleted;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        logger('User Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        logger('User Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        logger('User Deleted');
    }

    /**
     * @param $event
     */
    public function onConfirmed($event)
    {
        logger('User Confirmed');
    }

    /**
     * @param $event
     */
    public function onUnconfirmed($event)
    {
        logger('User Unconfirmed');
    }

    /**
     * @param $event
     */
    public function onPasswordChanged($event)
    {
        logger('User Password Changed');
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        logger('User Deactivated');
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        logger('User Reactivated');
    }

    /**
     * @param $event
     */
    public function onSocialDeleted($event)
    {
        logger('User Social Deleted');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        logger('User Permanently Deleted');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        logger('User Restored');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            UserCreated::class,
            'SCCatalog\Listeners\Backend\Auth\User\UserEventListener@onCreated'
        );

        $events->listen(
            UserUpdated::class,
            'SCCatalog\Listeners\Backend\Auth\User\UserEventListener@onUpdated'
        );

        $events->listen(
            UserDeleted::class,
            'SCCatalog\Listeners\Backend\Auth\User\UserEventListener@onDeleted'
        );

        $events->listen(
            UserConfirmed::class,
            'SCCatalog\Listeners\Backend\Auth\User\UserEventListener@onConfirmed'
        );

        $events->listen(
            UserUnconfirmed::class,
            'SCCatalog\Listeners\Backend\Auth\User\UserEventListener@onUnconfirmed'
        );

        $events->listen(
            UserPasswordChanged::class,
            'SCCatalog\Listeners\Backend\Auth\User\UserEventListener@onPasswordChanged'
        );

        $events->listen(
            UserDeactivated::class,
            'SCCatalog\Listeners\Backend\Auth\User\UserEventListener@onDeactivated'
        );

        $events->listen(
            UserReactivated::class,
            'SCCatalog\Listeners\Backend\Auth\User\UserEventListener@onReactivated'
        );

        $events->listen(
            UserSocialDeleted::class,
            'SCCatalog\Listeners\Backend\Auth\User\UserEventListener@onSocialDeleted'
        );

        $events->listen(
            UserPermanentlyDeleted::class,
            'SCCatalog\Listeners\Backend\Auth\User\UserEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            UserRestored::class,
            'SCCatalog\Listeners\Backend\Auth\User\UserEventListener@onRestored'
        );
    }
}
