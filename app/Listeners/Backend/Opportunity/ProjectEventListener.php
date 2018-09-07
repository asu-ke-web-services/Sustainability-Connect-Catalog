<?php

namespace SCCatalog\Listeners\Opportunity;

/**
 * Class ProjectEventListener.
 */
class ProjectEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Project Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Project Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Project Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \SCCatalog\Events\Opportunity\Project\ProjectCreated::class,
            'SCCatalog\Listeners\Opportunity\Project\ProjectEventListener@onCreated'
        );

        $events->listen(
            \SCCatalog\Events\Opportunity\Project\ProjectUpdated::class,
            'SCCatalog\Listeners\Opportunity\Project\ProjectEventListener@onUpdated'
        );

        $events->listen(
            \SCCatalog\Events\Opportunity\Project\ProjectDeleted::class,
            'SCCatalog\Listeners\Opportunity\Project\ProjectEventListener@onDeleted'
        );
    }
}
