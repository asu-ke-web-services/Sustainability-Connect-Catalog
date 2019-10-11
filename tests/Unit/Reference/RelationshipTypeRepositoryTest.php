<?php

namespace Tests\Unit\Reference;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use SCCatalog\Models\Reference\RelationshipType;
use SCCatalog\Repositories\Reference\RelationshipTypeRepository;

class RelationshipTypeRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var RelationshipTypeRepository
     */
    protected $relationshipTypeRepository;

    protected function setUp() : void
    {
        parent::setUp();

        $this->relationshipTypeRepository = $this->app->make(RelationshipTypeRepository::class);
    }

    protected function getValidRelationshipTypeData($relationshipTypeData = [])
    {
        return array_merge([
            'order' => '1',
            'name' => 'Test RelationshipType',
        ], $relationshipTypeData);
    }

    /** @test */
    public function it_can_create_new_relationship_types()
    {
        $this->assertEquals(0, RelationshipType::count());

        $this->relationshipTypeRepository->create($this->getValidRelationshipTypeData());

        $this->assertEquals(1, RelationshipType::count());
    }

    /** @test */
    public function it_can_update_existing_relationship_types()
    {
        $relationshipType = factory(RelationshipType::class)->create();

        $updatedRelationshipType = $this->relationshipTypeRepository->update($relationshipType, $this->getValidRelationshipTypeData([
            'order' => '2',
            'name' => 'Updated',
        ]));

        $this->assertEquals('2', $updatedRelationshipType->fresh()->order);
        $this->assertEquals('Updated', $updatedRelationshipType->fresh()->name);
    }
}
