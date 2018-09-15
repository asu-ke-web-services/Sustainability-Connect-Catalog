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
use SCCatalog\Repositories\Backend\Opportunity\OpportunityRepository;

class OpportunityRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var OpportunityRepository
     */
    protected $opportunityRepository;

    protected function setUp()
    {
        parent::setUp();

        $this->opportunityRepository = $this->app->make(OpportunityRepository::class);
    }

    protected function getValidProjectData($projectData = [])
    {
        return array_merge([
            'review_status_id' => '1',
            'degree_program' => 'School of Sustainability',
            'compensation' => 'Lorem compensation',
            'responsiblities' => 'Lorem responsiblities',
            'learning_outcomes' => 'Lorem learning outcomes',
            'sustainability_outcomes' => 'Lorem sustainability outcomes',
            'qualifications' => 'Lorem qualifications',
            'application_instructions' => 'Lorem application instructions',
            'implementation_paths' => 'Lorem implementation',
            'budget_type_id' => '3',
            'budget_amount' => 'Lorem budget notes',
            'program_lead' => 'Lorem program lead',
            'success_story' => 'https://example.test',
            'library_collection' => 'https://example.test',
        ], $projectData);
    }

    protected function getValidOpportunityData($opportunityData = [])
    {
        return array_merge([
            'opportunityable_type' => 'Project',
            'opportunityable_id' => 'Project',
            'name' => 'Test Opportunity',
            'name' => 'Public Test Opportunity',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'listing_start_date' => Carbon::now(),
            'listing_end_date' => Carbon::now(),
            'application_deadline' => Carbon::now(),
            'application_deadline_text' => 'Ongoing',
            'opportunity_status_id' => Carbon::now(),
            'is_hidden' => false,
            'description' => 'Lorem ipsum',
            'summary' => 'Lorem ipsum',
            'follower_count' => 0,
            'parent_opportunity_id' => null,
            'organization_id' => 1,
            'supervisor_user_id' => 1,
            'submitting_user_id' => 1,
        ], $opportunityData);
    }

    /** @test */
    public function it_can_paginate_the_active_opportunities()
    {
        factory(Project::class, 30)->create();
        factory(Opportunity::class, 30)->create();

        $paginatedOpportunitys = $this->opportunityRepository->getActivePaginated(25);

        $this->assertEquals(2, $paginatedOpportunitys->lastPage());
        $this->assertEquals(25, $paginatedOpportunitys->perPage());
        $this->assertEquals(30, $paginatedOpportunitys->total());

        $newPaginatedOpportunitys = $this->opportunityRepository->getActivePaginated(5);

        $this->assertEquals(5, $newPaginatedOpportunitys->perPage());
    }

    /** @test */
    public function it_can_paginate_the_closed_opportunities()
    {
        factory(Opportunity::class, 30)->create();
        factory(Opportunity::class, 25)->states('inactive')->create();

        $paginatedOpportunitys = $this->opportunityRepository->getInactivePaginated(10);

        $this->assertEquals(3, $paginatedOpportunitys->lastPage());
        $this->assertEquals(10, $paginatedOpportunitys->perPage());
        $this->assertEquals(25, $paginatedOpportunitys->total());
    }

    /** @test */
    public function it_can_paginate_the_soft_deleted_inactive_opportunities()
    {
        factory(Opportunity::class, 30)->create();
        factory(Opportunity::class, 25)->states('softDeleted')->create();

        $paginatedOpportunitys = $this->opportunityRepository->getDeletedPaginated(10);

        $this->assertEquals(3, $paginatedOpportunitys->lastPage());
        $this->assertEquals(10, $paginatedOpportunitys->perPage());
        $this->assertEquals(25, $paginatedOpportunitys->total());
    }

    /** @test */
    public function it_can_create_new_opportunities()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->assertEquals(0, Opportunity::count());

        $this->opportunityRepository->create($this->getValidOpportunityData());

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

        $this->opportunityRepository->update($opportunity, $this->getValidOpportunityData([
            'first_name' => 'updated',
            'last_name' => 'name',
            'email' => 'new@email.com',
        ]));

        $this->assertEquals('updated', $opportunity->fresh()->first_name);
        $this->assertEquals('name', $opportunity->fresh()->last_name);
        $this->assertEquals('new@email.com', $opportunity->fresh()->email);

        Event::assertDispatched(OpportunityUpdated::class);
    }
}
