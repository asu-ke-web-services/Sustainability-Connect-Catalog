<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Event;
use SCCatalog\Events\Backend\Opportunity\InternshipCreated;
use SCCatalog\Events\Backend\Opportunity\InternshipUpdated;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\Backend\Opportunity\InternshipRepository;

class InternshipRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var InternshipRepository
     */
    protected $repository;

    protected function setUp()
    {
        parent::setUp();

        $this->repository = $this->app->make(InternshipRepository::class);
    }

    protected function getValidInternshipData($internshipData = [])
    {
        return array_merge([
            'name'                                => 'Test Internship',
            'opportunity_start_at'                => Carbon::yesterday(),
            'opportunity_end_at'                  => Carbon::tomorrow(),
            'listing_start_at'                    => Carbon::yesterday(),
            'listing_end_at'                      => Carbon::tomorrow(),
            'application_deadline_at'             => Carbon::tomorrow(),
            'opportunity_status_id'               => 5,
            'description'                         => 'Lorem ipsum',
            // 'parent_opportunity_id' => null,
            'supervisor_user_id'                  => 1,
            'submitting_user_id'                  => 1,
            'degree_program'                      => 'School of Sustainability',
            'compensation'                        => 'Lorem compensation',
            'responsiblities'                     => 'Lorem responsiblities',
            'qualifications'                      => 'Lorem qualifications',
            'application_instructions'            => 'Lorem application instructions',
            'program_lead'                        => 'Lorem program lead',
            'success_story'                       => 'https://example.test',
            'library_collection'                  => 'https://example.test',
        ], $internshipData);
    }

    /** @test */
    public function it_can_paginate_the_active_internships()
    {
        Internship::withoutSyncingToSearch(function () {
            factory(Internship::class, 30)->create();

            $paginatedInternships = $this->repository->getActivePaginated(25);

            $this->assertEquals(2, $paginatedInternships->lastPage());
            $this->assertEquals(25, $paginatedInternships->perPage());
            $this->assertEquals(30, $paginatedInternships->total());

            $newPaginatedInternships = $this->repository->getActivePaginated(5);

            $this->assertEquals(5, $newPaginatedInternships->perPage());
        });
    }

    /** @test */
    public function it_can_paginate_the_closed_internships()
    {
        Internship::withoutSyncingToSearch(function () {
            factory(Internship::class, 30)->create();
            factory(Internship::class, 25)->states('inactive')->create();

            $paginatedInternships = $this->repository->getInactivePaginated(10);

            $this->assertEquals(3, $paginatedInternships->lastPage());
            $this->assertEquals(10, $paginatedInternships->perPage());
            $this->assertEquals(25, $paginatedInternships->total());
        });
    }

    /** @test */
    public function it_can_paginate_the_soft_deleted_internships()
    {
        Internship::withoutSyncingToSearch(function () {
            factory(Internship::class, 30)->create();
            factory(Internship::class, 25)->states('softDeleted')->create();

            $paginatedInternships = $this->repository->getDeletedPaginated(10);

            $this->assertEquals(3, $paginatedInternships->lastPage());
            $this->assertEquals(10, $paginatedInternships->perPage());
            $this->assertEquals(25, $paginatedInternships->total());
        });
    }

    /** @test */
    public function it_can_create_new_internships()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->assertEquals(0, Internship::count());

        Internship::withoutSyncingToSearch(function () {
            $this->repository->create($this->getValidInternshipData());

            $this->assertEquals(1, Internship::count());
        });

        Event::assertDispatched(InternshipCreated::class);
    }

    /** @test */
    public function it_can_update_existing_internships()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Internship::withoutSyncingToSearch(function () {
            $internship = factory(Internship::class)->create();

            $this->repository->update($internship, $this->getValidInternshipData([
                'name'                  => 'updated name',
                'description'           => 'updated description',
                'opportunity_status_id' => 3,
            ]));

            $this->assertEquals('updated name', $internship->fresh()->name);
            $this->assertEquals('updated description', $internship->fresh()->description);
            $this->assertEquals(3, $internship->fresh()->opportunity_status_id);
        });

        Event::assertDispatched(InternshipUpdated::class);
    }

    /** @test */
    public function it_can_destroy_internships()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Internship::withoutSyncingToSearch(function () {
            $internship = $this->repository->create($this->getValidInternshipData());

            $this->assertEquals(1, Internship::count());

            $this->repository->deleteById($internship->id);

            $this->assertEquals(0, Internship::count());
        });

        Event::assertDispatched(InternshipCreated::class);
    }
}
