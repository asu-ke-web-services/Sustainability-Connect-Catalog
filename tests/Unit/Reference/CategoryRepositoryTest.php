<?php

namespace Tests\Unit\Reference;

use Tests\TestCase;
use SCCatalog\Models\Reference\Category;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use SCCatalog\Repositories\Reference\CategoryRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    protected function setUp() : void
    {
        parent::setUp();

        $this->categoryRepository = $this->app->make(CategoryRepository::class);
    }

    protected function getValidCategoryData($categoryData = [])
    {
        return array_merge([
            'order' => '1',
            'name' => 'Test Category',
        ], $categoryData);
    }

    /** @test */
    public function it_can_create_new_categories()
    {
        $this->assertEquals(0, Category::count());

        $this->categoryRepository->create($this->getValidCategoryData());

        $this->assertEquals(1, Category::count());
    }

    /** @test */
    public function it_can_update_existing_categories()
    {
        $category = factory(Category::class)->create();

        $updatedCategory = $this->categoryRepository->update($category, $this->getValidCategoryData([
            'order' => '2',
            'name' => 'Updated',
        ]));

        $this->assertEquals('2', $updatedCategory->fresh()->order);
        $this->assertEquals('Updated', $updatedCategory->fresh()->name);
    }
}
