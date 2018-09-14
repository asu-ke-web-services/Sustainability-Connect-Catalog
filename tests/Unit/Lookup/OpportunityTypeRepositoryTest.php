<?php

namespace Tests\Unit\Lookup;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use SCCatalog\Models\Lookup\OpportunityType;
use SCCatalog\Repositories\Backend\Lookup\OpportunityTypeRepository;

class OpportunityTypeRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var OpportunityTypeRepository
     */
    protected $opportunityTypeRepository;

    protected function setUp()
    {
        parent::setUp();

        $this->opportunityTypeRepository = $this->app->make(OpportunityTypeRepository::class);
    }

    protected function getValidOpportunityTypeData($opportunityTypeData = [])
    {
        return array_merge([
            'order'               => '1',
            'name'                => 'Test OpportunityType',
        ], $opportunityTypeData);
    }

    /** @test */
    public function it_can_create_new_opportunity_types()
    {
        $this->assertEquals(0, OpportunityType::count());

        $this->opportunityTypeRepository->create($this->getValidOpportunityTypeData());

        $this->assertEquals(1, OpportunityType::count());
    }

    /** @test */
    public function it_can_update_existing_opportunity_types()
    {
        $opportunityType = factory(OpportunityType::class)->create();

        $updatedOpportunityType = $this->opportunityTypeRepository->updateById($opportunityType->id, $this->getValidOpportunityTypeData([
            'order'          => '2',
            'name'           => 'Updated',
        ]));

        $this->assertEquals('2', $updatedOpportunityType->fresh()->order);
        $this->assertEquals('Updated', $updatedOpportunityType->fresh()->name);
    }
}
