<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Event;
use SCCatalog\Events\Backend\Opportunity\OpportunityCreated;
use SCCatalog\Events\Backend\Opportunity\OpportunityUpdated;
use SCCatalog\Models\Opportunity\Opportunity;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\Backend\Opportunity\InternshipRepository;

class InternshipRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var InternshipRepository
     */
    protected $internshipRepository;

    protected function setUp()
    {
        parent::setUp();

        $this->internshipRepository = $this->app->make(InternshipRepository::class);
    }

    protected function getValidInternshipData($internshipData = [])
    {
        return array_merge([
            'name' => 'Test Internship',
            'name' => 'Public Test Internship',
            'start_date' => '2018-10-01',
            'end_date' => '2018-12-01',
            'listing_start_date' => '2018-08-01',
            'listing_end_date' => '2018-09-30',
            'application_deadline' => '2018-10-01',
            'opportunity_status_id' => 5,
            'is_hidden' => false,
            'description' => 'Lorem ipsum',
            'parent_opportunity_id' => null,
            'organization_id' => 1,
            'supervisor_user_id' => 1,
            'submitting_user_id' => 1,
            'opportunityable' => [
                'degree_program' => 'School of Sustainability',
                'compensation' => 'Lorem compensation',
                'responsiblities' => 'Lorem responsiblities',
                'qualifications' => 'Lorem qualifications',
                'application_instructions' => 'Lorem application instructions',
                'success_story' => 'https://example.test',
            ]
        ], $internshipData);
    }

    /** @test */
    public function it_can_paginate_the_active_internships()
    {
        factory(Internship::class, 30)
            ->create()
            ->each(function($internship) {
                $internship
                ->opportunity()
                ->save(
                    factory(Opportunity::class)->make()
                );
            });

        $paginatedInternships = $this->internshipRepository->getActivePaginated(25);

        $this->assertEquals(2, $paginatedInternships->lastPage());
        $this->assertEquals(25, $paginatedInternships->perPage());
        $this->assertEquals(30, $paginatedInternships->total());

        $newPaginatedInternships = $this->internshipRepository->getActivePaginated(5);

        $this->assertEquals(5, $newPaginatedInternships->perPage());
    }

    /** @test */
    public function it_can_paginate_the_closed_opportunities()
    {
        factory(Internship::class, 30)
            ->create()
            ->each(function($internship) {
                $internship
                ->opportunity()
                ->save(
                    factory(Opportunity::class)->make()
                );
            });

        factory(Internship::class, 25)
            ->create()
            ->each(function($internship) {
                $internship
                ->opportunity()
                ->save(
                    factory(Opportunity::class)
                    ->states('closed')
                    ->make()
                );
            });

        $paginatedInternships = $this->internshipRepository->getClosedPaginated(10);

        $this->assertEquals(3, $paginatedInternships->lastPage());
        $this->assertEquals(10, $paginatedInternships->perPage());
        $this->assertEquals(25, $paginatedInternships->total());
    }

    /** @test */
    public function it_can_paginate_the_soft_deleted_opportunities()
    {
        factory(Internship::class, 30)
            ->create()
            ->each(function($internship) {
                $internship
                ->opportunity()
                ->save(
                    factory(Opportunity::class)->make()
                );
            });

        factory(Internship::class, 25)
            ->create()
            ->each(function($internship) {
                $internship
                ->opportunity()
                ->save(
                    factory(Opportunity::class)
                    ->states('softDeleted')
                    ->make()
                );
            });

        $paginatedInternships = $this->internshipRepository->getDeletedPaginated(10);

        $this->assertEquals(3, $paginatedInternships->lastPage());
        $this->assertEquals(10, $paginatedInternships->perPage());
        $this->assertEquals(25, $paginatedInternships->total());
    }

    /** @test */
    public function it_can_create_new_opportunities()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->assertEquals(0, Opportunity::count());

        $this->internshipRepository->create($this->getValidInternshipData());

        $this->assertEquals(1, Opportunity::count());

        Event::assertDispatched(OpportunityCreated::class);
    }

    /** @test */
    public function it_can_update_existing_opportunities()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);
        // We need at least one role to create a opportunity
        $opportunity = factory(Opportunity::class)->create();

        $this->internshipRepository->update($opportunity, $this->getValidInternshipData([
            'name'                  => 'updated name',
            'description'           => 'updated description',
            'opportunity_status_id' => 3,
        ]));

        $this->assertEquals('updated name', $opportunity->fresh()->name);
        $this->assertEquals('updated description', $opportunity->fresh()->description);
        $this->assertEquals(3, $opportunity->fresh()->opportunity_status_id);

        Event::assertDispatched(OpportunityUpdated::class);
    }
}
