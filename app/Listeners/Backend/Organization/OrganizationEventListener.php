<?php

namespace SCCatalog\Listeners\Organization;

/**
 * Class OrganizationEventListener.
 */
class OrganizationEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Organization Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Organization Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Organization Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \SCCatalog\Events\Backend\Organization\OrganizationCreated::class,
            'SCCatalog\Listeners\Backend\Organization\OrganizationEventListener@onCreated'
        );

        $events->listen(
            \SCCatalog\Events\Backend\Organization\OrganizationUpdated::class,
            'SCCatalog\Listeners\Backend\Organization\OrganizationEventListener@onUpdated'
        );

        $events->listen(
            \SCCatalog\Events\Backend\Organization\OrganizationDeleted::class,
            'SCCatalog\Listeners\Backend\Organization\OrganizationEventListener@onDeleted'
        );
    }
}
