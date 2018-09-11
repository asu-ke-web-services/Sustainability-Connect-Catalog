<?php

namespace Tests\Unit\Lookup;

use Tests\TestCase;
use SCCatalog\Models\Lookup\BudgetType;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use SCCatalog\Repositories\Backend\Lookup\BudgetTypeRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BudgetTypeRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var BudgetTypeRepository
     */
    protected $budgetTypeRepository;

    protected function setUp()
    {
        parent::setUp();

        $this->budgetTypeRepository = $this->app->make(BudgetTypeRepository::class);
    }

    protected function getValidBudgetTypeData($budgetTypeData = [])
    {
        return array_merge([
            'order'               => '1',
            'name'                => 'Test BudgetType',
        ], $budgetTypeData);
    }

    /** @test */
    public function it_can_create_new_budget_types()
    {
        $this->assertEquals(0, BudgetType::count());

        $this->budgetTypeRepository->create($this->getValidBudgetTypeData());

        $this->assertEquals(1, BudgetType::count());
    }

    /** @test */
    public function it_can_update_existing_budget_types()
    {
        $budgetType = factory(BudgetType::class)->create();

        $updatedBudgetType = $this->budgetTypeRepository->updateById($budgetType->id, $this->getValidBudgetTypeData([
            'order'          => '2',
            'name'           => 'Updated',
        ]));

        $this->assertEquals('2', $updatedBudgetType->fresh()->order);
        $this->assertEquals('Updated', $updatedBudgetType->fresh()->name);
    }
}
