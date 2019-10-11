<?php

namespace SCCatalog\Listeners\Frontend\Auth;

use SCCatalog\Events\Frontend\Auth\UserLoggedIn;
use SCCatalog\Events\Frontend\Auth\UserConfirmed;
use SCCatalog\Events\Frontend\Auth\UserLoggedOut;
use SCCatalog\Events\Frontend\Auth\UserRegistered;
use SCCatalog\Events\Frontend\Auth\UserProviderRegistered;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @param $event
     */
    public function onLoggedIn($event)
    {
        $ip_address = request()->getClientIp();

        // Update the logging in users time & IP
        $event->user->fill([
            'last_login_at' => now()->toDateTimeString(),
            'last_login_ip' => $ip_address,
        ]);

        // Update the timezone via IP address
        $geoip = geoip($ip_address);

        if ($event->user->timezone !== $geoip['timezone']) {
            // Update the users timezone
            $event->user->fill([
                'timezone' => $geoip['timezone'],
            ]);
        }

        $event->user->save();

        logger('User Logged In: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onLoggedOut($event)
    {
        logger('User Logged Out: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onRegistered($event)
    {
        logger('User Registered: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onProviderRegistered($event)
    {
        logger('User Provider Registered: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onConfirmed($event)
    {
        logger('User Confirmed: '.$event->user->full_name);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            UserLoggedIn::class,
            'SCCatalog\Listeners\Frontend\Auth\UserEventListener@onLoggedIn'
        );

        $events->listen(
            UserLoggedOut::class,
            'SCCatalog\Listeners\Frontend\Auth\UserEventListener@onLoggedOut'
        );

        $events->listen(
            UserRegistered::class,
            'SCCatalog\Listeners\Frontend\Auth\UserEventListener@onRegistered'
        );

        $events->listen(
            UserProviderRegistered::class,
            'SCCatalog\Listeners\Frontend\Auth\UserEventListener@onProviderRegistered'
        );

        $events->listen(
            UserConfirmed::class,
            'SCCatalog\Listeners\Frontend\Auth\UserEventListener@onConfirmed'
        );
    }
}
