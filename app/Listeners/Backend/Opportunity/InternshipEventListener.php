<?php

namespace SCCatalog\Listeners\Opportunity;

/**
 * Class InternshipEventListener.
 */
class InternshipEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Internship Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Internship Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Internship Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \SCCatalog\Events\Opportunity\Internship\InternshipCreated::class,
            'SCCatalog\Listeners\Opportunity\Internship\InternshipEventListener@onCreated'
        );

        $events->listen(
            \SCCatalog\Events\Opportunity\Internship\InternshipUpdated::class,
            'SCCatalog\Listeners\Opportunity\Internship\InternshipEventListener@onUpdated'
        );

        $events->listen(
            \SCCatalog\Events\Opportunity\Internship\InternshipDeleted::class,
            'SCCatalog\Listeners\Opportunity\Internship\InternshipEventListener@onDeleted'
        );
    }
}
