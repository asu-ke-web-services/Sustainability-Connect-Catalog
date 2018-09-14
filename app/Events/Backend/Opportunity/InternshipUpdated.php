<?php

namespace SCCatalog\Events\Opportunity;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use SCCatalog\Models\Opportunity\Internship;

class InternshipUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $internship;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Internship $internship)
    {
        $this->internship = $internship;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
