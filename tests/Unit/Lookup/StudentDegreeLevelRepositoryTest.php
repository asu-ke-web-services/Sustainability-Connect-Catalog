<?php

namespace Tests\Unit\Lookup;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use SCCatalog\Models\Lookup\StudentDegreeLevel;
use SCCatalog\Repositories\Lookup\StudentDegreeLevelRepository;

class StudentDegreeLevelRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var StudentDegreeLevelRepository
     */
    protected $studentDegreeLevelRepository;

    protected function setUp()
    {
        parent::setUp();

        $this->studentDegreeLevelRepository = $this->app->make(StudentDegreeLevelRepository::class);
    }

    protected function getValidStudentDegreeLevelData($studentDegreeLevelData = [])
    {
        return array_merge([
            'order'               => '1',
            'name'                => 'Test StudentDegreeLevel',
        ], $studentDegreeLevelData);
    }

    /** @test */
    public function it_can_create_new_student_degree_levels()
    {
        $this->assertEquals(0, StudentDegreeLevel::count());

        $this->studentDegreeLevelRepository->create($this->getValidStudentDegreeLevelData());

        $this->assertEquals(1, StudentDegreeLevel::count());
    }

    /** @test */
    public function it_can_update_existing_student_degree_levels()
    {
        $studentDegreeLevel = factory(StudentDegreeLevel::class)->create();

        $updatedStudentDegreeLevel = $this->studentDegreeLevelRepository->updateById($studentDegreeLevel->id, $this->getValidStudentDegreeLevelData([
            'order'          => '2',
            'name'           => 'Updated',
        ]));

        $this->assertEquals('2', $updatedStudentDegreeLevel->fresh()->order);
        $this->assertEquals('Updated', $updatedStudentDegreeLevel->fresh()->name);
    }
}
