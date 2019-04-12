<?php

namespace Tests\Unit\Lookup;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use SCCatalog\Models\Lookup\OrganizationType;
use SCCatalog\Repositories\Lookup\OrganizationTypeRepository;

class OrganizationTypeRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var OrganizationTypeRepository
     */
    protected $organizationTypeRepository;

    protected function setUp()
    {
        parent::setUp();

        $this->organizationTypeRepository = $this->app->make(OrganizationTypeRepository::class);
    }

    protected function getValidOrganizationTypeData($organizationTypeData = [])
    {
        return array_merge([
            'order' => '1',
            'name' => 'Test OrganizationType',
        ], $organizationTypeData);
    }

    /** @test */
    public function it_can_create_new_organization_types()
    {
        $this->assertEquals(0, OrganizationType::count());

        $this->organizationTypeRepository->create($this->getValidOrganizationTypeData());

        $this->assertEquals(1, OrganizationType::count());
    }

    /** @test */
    public function it_can_update_existing_organization_types()
    {
        $organizationType = factory(OrganizationType::class)->create();

        $updatedOrganizationType = $this->organizationTypeRepository->updateById($organizationType->id, $this->getValidOrganizationTypeData([
            'order' => '2',
            'name' => 'Updated',
        ]));

        $this->assertEquals('2', $updatedOrganizationType->fresh()->order);
        $this->assertEquals('Updated', $updatedOrganizationType->fresh()->name);
    }
}
