<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

    /** @test */
    public function it_can_paginate_the_active_internships()
    {
        Internship::withoutSyncingToSearch(function () {
        factory(Internship::class, 30)
            ->create()
            ->each(function($internship) {
                $internship
                ->opportunity()
                ->save(
                    factory(Opportunity::class)->make()
                );
            });
        });

        $paginatedInternships = $this->internshipRepository->getActivePaginated(25);

        $this->assertEquals(2, $paginatedInternships->lastPage());
        $this->assertEquals(25, $paginatedInternships->perPage());
        $this->assertEquals(30, $paginatedInternships->total());

        $newPaginatedInternships = $this->internshipRepository->getActivePaginated(5);

        $this->assertEquals(5, $newPaginatedInternships->perPage());
    }

    /** @test */
    public function it_can_paginate_the_closed_internships()
    {
        Internship::withoutSyncingToSearch(function () {
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
        });

        $paginatedInternships = $this->internshipRepository->getClosedPaginated(10);

        $this->assertEquals(3, $paginatedInternships->lastPage());
        $this->assertEquals(10, $paginatedInternships->perPage());
        $this->assertEquals(25, $paginatedInternships->total());
    }

    /** @test */
    public function it_can_paginate_the_soft_deleted_internships()
    {
        Internship::withoutSyncingToSearch(function () {
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
        });

        $paginatedInternships = $this->internshipRepository->getDeletedPaginated(10);

        $this->assertEquals(3, $paginatedInternships->lastPage());
        $this->assertEquals(10, $paginatedInternships->perPage());
        $this->assertEquals(25, $paginatedInternships->total());
    }
}
