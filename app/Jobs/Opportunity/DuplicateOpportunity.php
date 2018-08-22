<?php

namespace SCCatalog\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use SCCatalog\Models\Opportunity;
use SCCatalog\Models\User;

class DuplicateOpportunity implements ShouldQueue
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
        $newOpportunity = $this->opportunity->replicate();
        $newOpportunity->save();


        foreach($this->opportunity->opportunityable as $opportunityable) {
            $newOpportunityable = $opportunityable->replicate();
            if ($newOpportunityable->push()){
                $this->opportunity->opportunityable()->save($newOpportunityable);
            }
        }

        // foreach($this->opportunity->addresses as $address) {
        //     $newOpportunity->addresses()->attach($address);
        //     // you may set the timestamps to the second argument of attach()
        // }

        // foreach($this->opportunity->notes as $note) {
        //     $newOpportunity->notes()->attach($note);
        //     // you may set the timestamps to the second argument of attach()
        // }

        foreach($this->opportunity->affiliations as $affiliation) {
            $newOpportunity->affiliations()->attach($affiliation);
            // you may set the timestamps to the second argument of attach()
        }

        foreach($this->opportunity->categories as $category) {
            $newOpportunity->categories()->attach($category);
            // you may set the timestamps to the second argument of attach()
        }

        foreach($this->opportunity->keywords as $keyword) {
            $newOpportunity->keywords()->attach($keyword);
            // you may set the timestamps to the second argument of attach()
        }

        foreach($this->opportunity->allRelatedUsers as $user) {
            $newOpportunity->allRelatedUsers()->attach($user);
            // you may set the timestamps to the second argument of attach()
        }
    }
}
