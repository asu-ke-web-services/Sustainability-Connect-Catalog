<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Event;
use SCCatalog\Events\Backend\Opportunity\ProjectCreated;
use SCCatalog\Events\Backend\Opportunity\ProjectUpdated;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\Backend\Opportunity\ProjectRepository;

class ProjectRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ProjectRepository
     */
    protected $projectRepository;

    protected function setUp()
    {
        parent::setUp();

        $this->projectRepository = $this->app->make(ProjectRepository::class);
    }

    protected function getValidOpportunityData($opportunityData = [])
    {
        return array_merge([
            'name' => 'Test Project',
            'name' => 'Public Test Project',
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
            ]
        ], $projectData);
    }

    /** @test */
    public function it_can_create_new_projects()
    {
        // $initialDispatcher = Event::getFacadeRoot();
        // Event::fake();
        // Model::setEventDispatcher($initialDispatcher);

        $this->assertEquals(0, Opportunity::count());

        $this->projectRepository->create($this->getValidOpportunityData());

        $this->assertEquals(1, Opportunity::count());

        // Event::assertDispatched(ProjectCreated::class);
    }

    /** @test */
    // public function it_can_update_existing_projects()
    // {
    //     $initialDispatcher = Event::getFacadeRoot();
    //     Event::fake();
    //     Model::setEventDispatcher($initialDispatcher);
    //     // We need at least one role to create a project
    //     $project = factory(Opportunity::class)->create();

    //     $this->projectRepository->update($project, $this->getValidProjectData([
    //         'first_name' => 'updated',
    //         'last_name' => 'name',
    //         'email' => 'new@email.com',
    //     ]));

    //     $this->assertEquals('updated', $project->fresh()->first_name);
    //     $this->assertEquals('name', $project->fresh()->last_name);
    //     $this->assertEquals('new@email.com', $project->fresh()->email);

    //     Event::assertDispatched(ProjectUpdated::class);
    // }
}
