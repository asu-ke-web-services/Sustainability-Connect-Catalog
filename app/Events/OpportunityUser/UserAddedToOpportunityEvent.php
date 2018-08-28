<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use SCCatalog\Models\Opportunity;
use SCCatalog\Models\User;

class UserAddedToOpportunityEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $opportunity;
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Opportunity $opportunity, User $user)
    {
        $this->opportunity = $opportunity;
        $this->user = $user;
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
