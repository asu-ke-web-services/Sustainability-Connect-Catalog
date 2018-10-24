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

    /** @test */
    public function it_can_paginate_the_active_projects()
    {
        Project::withoutSyncingToSearch(function () {
            factory(Project::class, 30)
                ->create()
                ->each(function($project) {
                    $project
                    ->opportunity()
                    ->save(
                        factory(Opportunity::class)->make()
                    );
                });
        });

        $paginatedProjects = $this->projectRepository->getActivePaginated(25);

        $this->assertEquals(2, $paginatedProjects->lastPage());
        $this->assertEquals(25, $paginatedProjects->perPage());
        $this->assertEquals(30, $paginatedProjects->total());

        $newPaginatedProjects = $this->projectRepository->getActivePaginated(5);

        $this->assertEquals(5, $newPaginatedProjects->perPage());
    }

    /** @test */
    public function it_can_paginate_the_closed_projects()
    {
        Project::withoutSyncingToSearch(function () {
            factory(Project::class, 30)
                ->create()
                ->each(function($project) {
                    $project
                    ->opportunity()
                    ->save(
                        factory(Opportunity::class)->make()
                    );
                });

            factory(Project::class, 25)
                ->create()
                ->each(function($project) {
                    $project
                    ->opportunity()
                    ->save(
                        factory(Opportunity::class)
                        ->states('closed')
                        ->make()
                    );
                });
        });

        $paginatedProjects = $this->projectRepository->getClosedPaginated(10);

        $this->assertEquals(3, $paginatedProjects->lastPage());
        $this->assertEquals(10, $paginatedProjects->perPage());
        $this->assertEquals(25, $paginatedProjects->total());
    }

    /** @test */
    public function it_can_paginate_the_soft_deleted_projects()
    {
        Project::withoutSyncingToSearch(function () {
            factory(Project::class, 30)
                ->create()
                ->each(function($project) {
                    $project
                    ->opportunity()
                    ->save(
                        factory(Opportunity::class)->make()
                    );
                });

            factory(Project::class, 25)
                ->create()
                ->each(function($project) {
                    $project
                    ->opportunity()
                    ->save(
                        factory(Opportunity::class)
                        ->states('softDeleted')
                        ->make()
                    );
                });
        });

        $paginatedProjects = $this->projectRepository->getDeletedPaginated(10);

        $this->assertEquals(3, $paginatedProjects->lastPage());
        $this->assertEquals(10, $paginatedProjects->perPage());
        $this->assertEquals(25, $paginatedProjects->total());
    }
}
