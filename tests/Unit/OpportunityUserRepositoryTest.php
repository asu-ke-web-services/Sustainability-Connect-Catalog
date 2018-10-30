<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use SCCatalog\Events\Backend\OpportunityUser\UserAddedToOpportunity;
use SCCatalog\Events\Backend\OpportunityUser\OpportunityUserRelationshipUpdated;
use SCCatalog\Events\Backend\OpportunityUser\UserRemovedFromOpportunity;
use SCCatalog\Models\Auth\User;
use SCCatalog\Models\Opportunity\Opportunity;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\Backend\Opportunity\OpportunityUserRepository;

class OpportunityUserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var OpportunityUserRepository
     */
    protected $opportunityUserRepository;

    protected function setUp()
    {
        parent::setUp();

        $this->opportunityUserRepository = $this->app->make(OpportunityUserRepository::class);
    }

    protected function getValidOpportunityUserData($opportunityUserData = [])
    {
        return array_merge([
            'relationship_type_id' => 1,
            'comments' => 'Test comment',
        ], $opportunityUserData);
    }

    /** @test */
    public function it_can_attach_new_users()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Project::withoutSyncingToSearch(function () {
            factory(Project::class)
                ->create()
                ->each(function($project) {
                    $project
                        ->opportunity()
                        ->save(
                            factory(Opportunity::class)->make()
                        );
                });

            factory(User::class)->create();

            $opportunity = Opportunity::first();
            $user = User::first();

            $this->assertEquals(0, $opportunity->users()->count());

            $this->opportunityUserRepository->attach($opportunity, $user, $this->getValidOpportunityUserData());

            $this->assertEquals(1, $opportunity->users()->count());
        });

        Event::assertDispatched(UserAddedToOpportunity::class);
    }

    /** @test */
    public function it_can_update_existing_users()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Project::withoutSyncingToSearch(function () {
            factory(Project::class)
                ->create()
                ->each(function($project) {
                    $project
                        ->opportunity()
                        ->save(
                            factory(Opportunity::class)->make()
                        );
                });

            factory(User::class)->create();

            $opportunity = Opportunity::first();
            $user = User::first();
            $opportunity = $this->opportunityUserRepository->attach($opportunity, $user, $this->getValidOpportunityUserData());

            $opportunity = $this->opportunityUserRepository->update($opportunity, $user, $this->getValidOpportunityUserData([
                'relationship_type_id' => 2,
                'comments' => 'updated comment',
            ]));

            $this->assertEquals(2, $opportunity->users->first()->pivot->relationship_type_id);
            $this->assertEquals('updated comment', $opportunity->users->first()->pivot->comments);
        });

        Event::assertDispatched(OpportunityUserRelationshipUpdated::class);
    }

    /** @test */
    public function it_can_remove_users()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Project::withoutSyncingToSearch(function () {
            factory(Project::class)
                ->create()
                ->each(function($project) {
                    $project
                        ->opportunity()
                        ->save(
                            factory(Opportunity::class)->make()
                        );
                });

            factory(User::class)->create();

            $opportunity = Opportunity::first();
            $user = User::first();
            $this->opportunityUserRepository->attach($opportunity, $user, $this->getValidOpportunityUserData());

            $this->assertEquals(1, $opportunity->users()->count());

            $this->opportunityUserRepository->detach($opportunity, $user, $this->getValidOpportunityUserData());

            $this->assertEquals(0, $opportunity->users()->count());
        });

        Event::assertDispatched(UserRemovedFromOpportunity::class);
    }
}
