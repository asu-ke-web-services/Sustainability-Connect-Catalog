<?php

namespace SCCatalog\Events\Frontend\OpportunityUser;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Models\Auth\User;

class UserFollowedInternship
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $internship;
    public $user;

    /**
     * Create a new event instance.
     *
     * @param Internship $internship
     * @param User $user
     */
    public function __construct(Internship $internship, User $user)
    {
        $this->internship = $internship;
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
