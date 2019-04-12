<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use SCCatalog\Events\Backend\OpportunityUser\UserAddedToProject;
use SCCatalog\Events\Backend\OpportunityUser\ProjectUserRelationshipUpdated;
use SCCatalog\Events\Backend\OpportunityUser\UserRemovedFromProject;
use SCCatalog\Models\Auth\User;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\Opportunity\ProjectUserRepository;

class ProjectUserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ProjectUserRepository
     */
    protected $projectUserRepository;

    protected function setUp()
    {
        parent::setUp();

        $this->projectUserRepository = $this->app->make(ProjectUserRepository::class);
    }

    protected function getValidProjectUserData($projectUserData = [])
    {
        return array_merge([
            'relationship_type_id' => 1,
            'comments' => 'Test comment',
        ], $projectUserData);
    }

    /** @test */
    public function it_can_attach_new_users()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Project::withoutSyncingToSearch(function () {
            factory(Project::class)->create();
            factory(User::class)->create();

            $project = Project::first();
            $user = User::first();

            $this->assertEquals(0, $project->users()->count());

            $this->projectUserRepository->attach($project, $user, $this->getValidProjectUserData());

            $this->assertEquals(1, $project->users()->count());
        });

        Event::assertDispatched(UserAddedToProject::class);
    }

    /** @test */
    public function it_can_update_existing_users()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Project::withoutSyncingToSearch(function () {
            factory(Project::class)->create();

            factory(User::class)->create();

            $project = Project::first();
            $user = User::first();
            $project = $this->projectUserRepository->attach($project, $user, $this->getValidProjectUserData());

            $project = $this->projectUserRepository->update($project, $user, $this->getValidProjectUserData([
                'relationship_type_id' => 2,
                'comments' => 'updated comment',
            ]));

            $this->assertEquals(2, $project->users->first()->pivot->relationship_type_id);
            $this->assertEquals('updated comment', $project->users->first()->pivot->comments);
        });

        Event::assertDispatched(ProjectUserRelationshipUpdated::class);
    }

    /** @test */
    public function it_can_remove_users()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Project::withoutSyncingToSearch(function () {
            factory(Project::class)->create();
            factory(User::class)->create();

            $project = Project::first();
            $user = User::first();
            $this->projectUserRepository->attach($project, $user, $this->getValidProjectUserData());

            $this->assertEquals(1, $project->users()->count());

            $this->projectUserRepository->detach($project, $user, $this->getValidProjectUserData());

            $this->assertEquals(0, $project->users()->count());
        });

        Event::assertDispatched(UserRemovedFromProject::class);
    }
}
