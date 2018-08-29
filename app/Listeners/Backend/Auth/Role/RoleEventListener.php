<?php

namespace SCCatalog\Listeners\Backend\Auth\Role;

/**
 * Class RoleEventListener.
 */
class RoleEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Role Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Role Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Role Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \SCCatalog\Events\Backend\Auth\Role\RoleCreated::class,
            'SCCatalog\Listeners\Backend\Auth\Role\RoleEventListener@onCreated'
        );

        $events->listen(
            \SCCatalog\Events\Backend\Auth\Role\RoleUpdated::class,
            'SCCatalog\Listeners\Backend\Auth\Role\RoleEventListener@onUpdated'
        );

        $events->listen(
            \SCCatalog\Events\Backend\Auth\Role\RoleDeleted::class,
            'SCCatalog\Listeners\Backend\Auth\Role\RoleEventListener@onDeleted'
        );
    }
}
