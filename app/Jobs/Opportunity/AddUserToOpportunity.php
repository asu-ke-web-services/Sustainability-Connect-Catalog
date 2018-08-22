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

class AddUserToOpportunity implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $opportunity;
    protected $user;
    protected $relationship;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Opportunity $opportunity, User $user, RelationshipType $relationship)
    {
        $this->opportunity  = $opportunity;
        $this->user         = $user;
        $this->relationship = $relationship;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->opportunity->allRelatedUsers()->syncWithoutDetaching([
            $this->user->id => ['relationship_type_id' => $this->relationship->id],
        ]);
    }
}
