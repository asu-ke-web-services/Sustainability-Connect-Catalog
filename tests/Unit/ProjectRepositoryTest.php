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
    protected $repository;

    protected function setUp()
    {
        parent::setUp();

        $this->repository = $this->app->make(ProjectRepository::class);
    }

    protected function getValidProjectData($projectData = [])
    {
        return array_merge([
            'name'                     => 'Test Project',
            'opportunity_start_at'     => Carbon::yesterday(),
            'opportunity_end_at'       => Carbon::tomorrow(),
            'listing_start_at'         => Carbon::yesterday(),
            'listing_end_at'           => Carbon::tomorrow(),
            'application_deadline_at'  => Carbon::tomorrow(),
            'application_deadline_text' => 'When Filled',
            'opportunity_status_id'    => 5,
            'review_status_id'         => 3,
            'description'              => 'Lorem ipsum',
            'supervisor_user_id'       => 1,
            'submitting_user_id'       => 1,
            'degree_program'           => 'School of Sustainability',
            'compensation'             => 'Lorem compensation',
            'responsiblities'          => 'Lorem responsiblities',
            'learning_outcomes'        => 'Lorem learning outcomes',
            'sustainability_outcomes'  => 'Lorem sustainability outcomes',
            'qualifications'           => 'Lorem qualifications',
            'application_instructions' => 'Lorem application instructions',
            'implementation_paths'     => 'Lorem implementation',
            'budget_type_id'           => 3,
            'budget_amount'            => 'Lorem budget notes',
            'program_lead'             => 'Lorem program lead',
            'success_story'            => 'https://example.test',
            'library_collection'       => 'https://example.test',
            //            'addresses'                => [],
            'affiliations'             => [2,3,6],
            'categories'               => [1,2],
            'keywords'                 => [1,2],
        ], $projectData);
    }

    /** @test */
    public function it_can_paginate_the_active_projects()
    {
        Project::withoutSyncingToSearch(function () {
            factory(Project::class, 30)->create();

            $paginatedProjects = $this->repository->getActivePaginated(25);

            $this->assertEquals(2, $paginatedProjects->lastPage());
            $this->assertEquals(25, $paginatedProjects->perPage());
            $this->assertEquals(30, $paginatedProjects->total());

            $newPaginatedProjects = $this->repository->getActivePaginated(5);

            $this->assertEquals(5, $newPaginatedProjects->perPage());
        });
    }

    /** @test */
    public function it_can_paginate_the_completed_projects()
    {
        Project::withoutSyncingToSearch(function () {
            factory(Project::class, 30)->create();
            factory(Project::class, 25)->states('completed')->create();

            $paginatedProjects = $this->repository->getCompletedPaginated(10);

            $this->assertEquals(3, $paginatedProjects->lastPage());
            $this->assertEquals(10, $paginatedProjects->perPage());
            $this->assertEquals(25, $paginatedProjects->total());
        });
    }

    /** @test */
    public function it_can_paginate_the_soft_deleted_projects()
    {
        Project::withoutSyncingToSearch(function () {
            factory(Project::class, 30)->create();
            factory(Project::class, 25)->states('softDeleted')->create();

            $paginatedProjects = $this->repository->getDeletedPaginated(10);

            $this->assertEquals(3, $paginatedProjects->lastPage());
            $this->assertEquals(10, $paginatedProjects->perPage());
            $this->assertEquals(25, $paginatedProjects->total());
        });
    }

    /** @test */
    public function it_can_create_new_projects()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->assertEquals(0, Project::count());

        Project::withoutSyncingToSearch(function () {
            $this->repository->create($this->getValidProjectData());

            $this->assertEquals(1, Project::count());
        });

        Event::assertDispatched(ProjectCreated::class);
    }

    /** @test */
    public function it_can_update_existing_projects()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Project::withoutSyncingToSearch(function () {
            $project = factory(Project::class)->create();

            $this->repository->update($project, $this->getValidProjectData([
                'name'                  => 'updated name',
                'description'           => 'updated description',
                'opportunity_status_id' => 3,
            ]));

            $this->assertEquals('updated name', $project->fresh()->name);
            $this->assertEquals('updated description', $project->fresh()->description);
            $this->assertEquals(3, $project->fresh()->opportunity_status_id);
        });

        Event::assertDispatched(ProjectUpdated::class);
    }

    /** @test */
    public function it_can_destroy_projects()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Project::withoutSyncingToSearch(function () {
            $project = $this->repository->create($this->getValidProjectData());

            $this->assertEquals(1, Project::count());

            $this->repository->deleteById($project->id);

            $this->assertEquals(0, Project::count());
        });

        Event::assertDispatched(ProjectCreated::class);
    }
}
