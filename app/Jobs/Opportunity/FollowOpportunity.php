<?php

namespace SCCatalog\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use SCCatalog\Models\Opportunity;
use SCCatalog\Models\RelationshipType;
use SCCatalog\Models\User;

class FollowOpportunity implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $opportunity;
    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Opportunity $opportunity, User $user)
    {
        $this->opportunity = $opportunity;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $relationship = RelationshipType::where('slug', 'follower')

        $this->opportunity->allRelatedUsers()->syncWithoutDetaching([
            $this->user->id => ['relationship_type_id' => $relationship->id],
        ]);
    }
}
