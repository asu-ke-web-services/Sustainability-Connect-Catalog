<?php

namespace Tests\Unit\Reference;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use SCCatalog\Models\Reference\Keyword;
use SCCatalog\Repositories\Reference\KeywordRepository;

class KeywordRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var KeywordRepository
     */
    protected $keywordRepository;

    protected function setUp() : void
    {
        parent::setUp();

        $this->keywordRepository = $this->app->make(KeywordRepository::class);
    }

    protected function getValidKeywordData($keywordData = [])
    {
        return array_merge([
            'order' => '1',
            'name' => 'Test Keyword',
        ], $keywordData);
    }

    /** @test */
    public function it_can_create_new_keywords()
    {
        $this->assertEquals(0, Keyword::count());

        $this->keywordRepository->create($this->getValidKeywordData());

        $this->assertEquals(1, Keyword::count());
    }

    /** @test */
    public function it_can_update_existing_keywords()
    {
        $keyword = factory(Keyword::class)->create();

        $updatedKeyword = $this->keywordRepository->update($keyword, $this->getValidKeywordData([
            'order' => '2',
            'name' => 'Updated',
        ]));

        $this->assertEquals('2', $updatedKeyword->fresh()->order);
        $this->assertEquals('Updated', $updatedKeyword->fresh()->name);
    }
}
