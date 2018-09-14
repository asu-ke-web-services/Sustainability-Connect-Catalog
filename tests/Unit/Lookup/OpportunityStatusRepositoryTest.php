<?php

namespace Tests\Unit\Lookup;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use SCCatalog\Models\Lookup\OpportunityStatus;
use SCCatalog\Repositories\Backend\Lookup\OpportunityStatusRepository;

class OpportunityStatusRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var OpportunityStatusRepository
     */
    protected $opportunityStatusRepository;

    protected function setUp()
    {
        parent::setUp();

        $this->opportunityStatusRepository = $this->app->make(OpportunityStatusRepository::class);
    }

    protected function getValidOpportunityStatusData($opportunityStatusData = [])
    {
        return array_merge([
            'opportunity_type_id' => '1',
            'order'               => '1',
            'name'                => 'Test OpportunityStatus',
        ], $opportunityStatusData);
    }

    /** @test */
    public function it_can_create_new_opportunity_statuses()
    {
        $this->assertEquals(0, OpportunityStatus::count());

        $this->opportunityStatusRepository->create($this->getValidOpportunityStatusData());

        $this->assertEquals(1, OpportunityStatus::count());
    }

    /** @test */
    public function it_can_update_existing_opportunity_statuses()
    {
        $opportunityStatus = factory(OpportunityStatus::class)->create($this->getValidOpportunityStatusData());

        $updatedOpportunityStatus = $this->opportunityStatusRepository->updateById($opportunityStatus->id, $this->getValidOpportunityStatusData([
            'opportunity_type_id' => '2',
            'order'               => '2',
            'name'                => 'Updated',
        ]));

        $this->assertEquals('2', $updatedOpportunityStatus->fresh()->order);
        $this->assertEquals('Updated', $updatedOpportunityStatus->fresh()->name);
    }
}
