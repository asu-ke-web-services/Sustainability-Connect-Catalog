<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use SCCatalog\Events\Backend\OpportunityUser\UserAddedToInternship;
use SCCatalog\Events\Backend\OpportunityUser\InternshipUserRelationshipUpdated;
use SCCatalog\Events\Backend\OpportunityUser\UserRemovedFromInternship;
use SCCatalog\Models\Auth\User;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\Opportunity\InternshipUserRepository;

class InternshipUserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var InternshipUserRepository
     */
    protected $internshipUserRepository;

    protected function setUp() : void
    {
        parent::setUp();

        $this->internshipUserRepository = $this->app->make(InternshipUserRepository::class);
    }

    protected function getValidInternshipUserData($internshipUserData = [])
    {
        return array_merge([
            'relationship_type_id' => 1,
            'comments' => 'Test comment',
        ], $internshipUserData);
    }

    /** @test */
    public function it_can_attach_new_users()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Internship::withoutSyncingToSearch(function () {
            factory(Internship::class)->create();
            factory(User::class)->create();

            $internship = Internship::first();
            $user = User::first();

            $this->assertEquals(0, $internship->users()->count());

            $this->internshipUserRepository->attach($internship, $user, $this->getValidInternshipUserData());

            $this->assertEquals(1, $internship->users()->count());
        });

        Event::assertDispatched(UserAddedToInternship::class);
    }

    /** @test */
    public function it_can_update_existing_users()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Internship::withoutSyncingToSearch(function () {
            factory(Internship::class)->create();

            factory(User::class)->create();

            $internship = Internship::first();
            $user = User::first();
            $internship = $this->internshipUserRepository->attach($internship, $user, $this->getValidInternshipUserData());

            $internship = $this->internshipUserRepository->update($internship, $user, $this->getValidInternshipUserData([
                'relationship_type_id' => 2,
                'comments' => 'updated comment',
            ]));

            $this->assertEquals(2, $internship->users->first()->pivot->relationship_type_id);
            $this->assertEquals('updated comment', $internship->users->first()->pivot->comments);
        });

        Event::assertDispatched(InternshipUserRelationshipUpdated::class);
    }

    /** @test */
    public function it_can_remove_users()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Internship::withoutSyncingToSearch(function () {
            factory(Internship::class)->create();
            factory(User::class)->create();

            $internship = Internship::first();
            $user = User::first();
            $this->internshipUserRepository->attach($internship, $user, $this->getValidInternshipUserData());

            $this->assertEquals(1, $internship->users()->count());

            $this->internshipUserRepository->detach($internship, $user, $this->getValidInternshipUserData());

            $this->assertEquals(0, $internship->users()->count());
        });

        Event::assertDispatched(UserRemovedFromInternship::class);
    }
}
