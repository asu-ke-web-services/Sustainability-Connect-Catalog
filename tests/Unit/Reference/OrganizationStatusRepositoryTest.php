<?php

namespace Tests\Unit\Reference;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use SCCatalog\Models\Reference\OrganizationStatus;
use SCCatalog\Repositories\Reference\OrganizationStatusRepository;

class OrganizationStatusRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var OrganizationStatusRepository
     */
    protected $organizationStatusRepository;

    protected function setUp() : void
    {
        parent::setUp();

        $this->organizationStatusRepository = $this->app->make(OrganizationStatusRepository::class);
    }

    protected function getValidOrganizationStatusData($organizationStatusData = [])
    {
        return array_merge([
            'order' => '1',
            'name' => 'Test OrganizationStatus',
        ], $organizationStatusData);
    }

    /** @test */
    public function it_can_create_new_organization_statuses()
    {
        $this->assertEquals(0, OrganizationStatus::count());

        $this->organizationStatusRepository->create($this->getValidOrganizationStatusData());

        $this->assertEquals(1, OrganizationStatus::count());
    }

    /** @test */
    public function it_can_update_existing_organization_statuses()
    {
        $organizationStatus = factory(OrganizationStatus::class)->create();

        $updatedOrganizationStatus = $this->organizationStatusRepository->update($organizationStatus, $this->getValidOrganizationStatusData([
            'order' => '2',
            'name' => 'Updated',
        ]));

        $this->assertEquals('2', $updatedOrganizationStatus->fresh()->order);
        $this->assertEquals('Updated', $updatedOrganizationStatus->fresh()->name);
    }
}
