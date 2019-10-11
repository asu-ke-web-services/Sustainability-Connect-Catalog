<?php

namespace Tests\Unit\Reference;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use SCCatalog\Models\Reference\OpportunityType;
use SCCatalog\Repositories\Reference\OpportunityTypeRepository;

class OpportunityTypeRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var OpportunityTypeRepository
     */
    protected $opportunityTypeRepository;

    protected function setUp() : void
    {
        parent::setUp();

        $this->opportunityTypeRepository = $this->app->make(OpportunityTypeRepository::class);
    }

    protected function getValidOpportunityTypeData($opportunityTypeData = [])
    {
        return array_merge([
            'order' => '1',
            'name' => 'Test OpportunityType',
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

        $updatedOpportunityType = $this->opportunityTypeRepository->update($opportunityType, $this->getValidOpportunityTypeData([
            'order' => '2',
            'name' => 'Updated',
        ]));

        $this->assertEquals('2', $updatedOpportunityType->fresh()->order);
        $this->assertEquals('Updated', $updatedOpportunityType->fresh()->name);
    }
}
