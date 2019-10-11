<?php

namespace Tests\Unit\Reference;

use Tests\TestCase;
use SCCatalog\Models\Reference\AttachmentType;
use SCCatalog\Repositories\Reference\AttachmentTypeRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AttachmentTypeRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var AttachmentTypeRepository
     */
    protected $attachmentTypeRepository;

    protected function setUp() : void
    {
        parent::setUp();

        $this->attachmentTypeRepository = $this->app->make(AttachmentTypeRepository::class);
    }

    protected function getValidAttachmentTypeData($attachmentTypeData = [])
    {
        return array_merge([
            'order' => '1',
            'name' => 'Test AttachmentType',
        ], $attachmentTypeData);
    }

    /** @test */
    public function it_can_create_new_attachment_types()
    {
        $this->assertEquals(0, AttachmentType::count());

        $this->attachmentTypeRepository->create($this->getValidAttachmentTypeData());

        $this->assertEquals(1, AttachmentType::count());
    }

    /** @test */
    public function it_can_update_existing_attachment_types()
    {
        $attachmentType = factory(AttachmentType::class)->create();

        $updatedAttachmentType = $this->attachmentTypeRepository->update($attachmentType, $this->getValidAttachmentTypeData([
            'order' => '2',
            'name' => 'Updated',
        ]));

        $this->assertEquals('2', $updatedAttachmentType->fresh()->order);
        $this->assertEquals('Updated', $updatedAttachmentType->fresh()->name);
    }
}
