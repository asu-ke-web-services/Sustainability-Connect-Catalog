<?php

namespace Tests\Unit\Lookup;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use SCCatalog\Models\Lookup\OpportunityReviewStatus;
use SCCatalog\Repositories\Lookup\OpportunityReviewStatusRepository;

class OpportunityReviewStatusRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var OpportunityReviewStatusRepository
     */
    protected $opportunityReviewStatusRepository;

    protected function setUp()
    {
        parent::setUp();

        $this->opportunityReviewStatusRepository = $this->app->make(OpportunityReviewStatusRepository::class);
    }

    protected function getValidOpportunityReviewStatusData($opportunityReviewStatusData = [])
    {
        return array_merge([
            'opportunity_type_id' => '1',
            'order'               => '1',
            'name'                => 'Test OpportunityReviewStatus',
        ], $opportunityReviewStatusData);
    }

    /** @test */
    public function it_can_create_new_opportunity_review_statuses()
    {
        $this->assertEquals(0, OpportunityReviewStatus::count());

        $this->opportunityReviewStatusRepository->create($this->getValidOpportunityReviewStatusData());

        $this->assertEquals(1, OpportunityReviewStatus::count());
    }

    /** @test */
    public function it_can_update_existing_opportunity_review_statuses()
    {
        $opportunityReviewStatus = factory(OpportunityReviewStatus::class)->create($this->getValidOpportunityReviewStatusData());

        $updatedOpportunityReviewStatus = $this->opportunityReviewStatusRepository->updateById($opportunityReviewStatus->id, $this->getValidOpportunityReviewStatusData([
            'opportunity_type_id' => '2',
            'order'               => '2',
            'name'                => 'Updated',
        ]));

        $this->assertEquals('2', $updatedOpportunityReviewStatus->fresh()->order);
        $this->assertEquals('Updated', $updatedOpportunityReviewStatus->fresh()->name);
    }
}
