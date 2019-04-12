<?php

namespace Tests\Unit\Lookup;

use Tests\TestCase;
use SCCatalog\Models\Lookup\Affiliation;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use SCCatalog\Repositories\Lookup\AffiliationRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AffiliationRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var AffiliationRepository
     */
    protected $affiliationRepository;

    protected function setUp()
    {
        parent::setUp();

        $this->affiliationRepository = $this->app->make(AffiliationRepository::class);
    }

    protected function getValidAffiliationData($affiliationData = [])
    {
        return array_merge([
            'opportunity_type_id' => '1',
            'order' => '1',
            'name' => 'Test Affiliation',
            'access_control' => false,
        ], $affiliationData);
    }

    /** @test */
    public function it_can_create_new_affiliations()
    {
        $this->assertEquals(0, Affiliation::count());

        $this->affiliationRepository->create($this->getValidAffiliationData());

        $this->assertEquals(1, Affiliation::count());
    }

    /** @test */
    public function it_can_update_existing_affiliations()
    {
        $affiliation = factory(Affiliation::class)->create();

        $updatedAffiliation = $this->affiliationRepository->updateById($affiliation->id, $this->getValidAffiliationData([
            'opportunity_type_id' => '2',
            'order' => '2',
            'name' => 'Updated',
            'access_control' => true,
        ]));

        $this->assertEquals('2', $updatedAffiliation->fresh()->opportunity_type_id);
        $this->assertEquals('2', $updatedAffiliation->fresh()->order);
        $this->assertEquals('Updated', $updatedAffiliation->fresh()->name);
        $this->assertEquals(true, $updatedAffiliation->fresh()->access_control);
    }
}
