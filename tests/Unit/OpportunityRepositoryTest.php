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
//use SCCatalog\Models\Opportunity\Internship;
//use SCCatalog\Models\Opportunity\Project;
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
            'opportunityable_type' => 'SCCatalog\Models\Opportunity\Project',
            'name' => 'Test Project',
            'public_name' => 'Public Test Project',
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
                'review_status_id' => 1,
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
            ]
        ], $projectData);
    }

    /** @test */
    public function it_can_create_new_opportunies()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->assertEquals(0, Opportunity::count());

        Project::withoutSyncingToSearch(function () {
            $this->opportunityRepository->create($this->getValidProjectData());
        });

        $this->assertEquals(1, Opportunity::count());

        Event::assertDispatched(OpportunityCreated::class);
    }

    /** @test */
    public function it_can_update_existing_opportunies()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Project::withoutSyncingToSearch(function () {
            $opportunity = factory(Opportunity::class)->create();

            $this->opportunityRepository->update($opportunity, $this->getValidProjectData([
                'name'                  => 'updated name',
                'description'           => 'updated description',
                'opportunity_status_id' => 3,
            ]));
        });

        $this->assertEquals('updated name', $opportunity->fresh()->name);
        $this->assertEquals('updated description', $opportunity->fresh()->description);
        $this->assertEquals(3, $opportunity->fresh()->opportunity_status_id);

        Event::assertDispatched(OpportunityUpdated::class);
    }

    /** @test */
    public function it_can_destroy_opportunies()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Project::withoutSyncingToSearch(function () {
            $opportunity = $this->opportunityRepository->create($this->getValidProjectData());

            $this->assertEquals(1, Opportunity::count());

            $this->opportunityRepository->deleteById($opportunity->id);
        });

        $this->assertEquals(0, Opportunity::count());

        Event::assertDispatched(OpportunityCreated::class);
    }


}
