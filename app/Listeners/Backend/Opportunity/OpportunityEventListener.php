<?php

namespace SCCatalog\Listeners\Opportunity;

/**
 * Class OpportunityEventListener.
 */
class OpportunityEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Opportunity Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Opportunity Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Opportunity Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \SCCatalog\Events\Opportunity\Opportunity\OpportunityCreated::class,
            'SCCatalog\Listeners\Opportunity\Opportunity\OpportunityEventListener@onCreated'
        );

        $events->listen(
            \SCCatalog\Events\Opportunity\Opportunity\OpportunityUpdated::class,
            'SCCatalog\Listeners\Opportunity\Opportunity\OpportunityEventListener@onUpdated'
        );

        $events->listen(
            \SCCatalog\Events\Opportunity\Opportunity\OpportunityDeleted::class,
            'SCCatalog\Listeners\Opportunity\Opportunity\OpportunityEventListener@onDeleted'
        );
    }
}
