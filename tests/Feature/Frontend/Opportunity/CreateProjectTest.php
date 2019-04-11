<?php

namespace Tests\Feature\Frontend\Opportunity;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use SCCatalog\Events\Backend\Opportunity\ProjectCreated;
use SCCatalog\Models\Opportunity\Project;

class CreateProjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_access_the_submit_project_page()
    {
        $admin = $this->loginAsAdmin();

        $this
            ->actingAs($admin)
            ->get(route('frontend.opportunity.project.public.create'))
            ->assertStatus(200)
            ->assertSee('Project Proposal')
            ->assertSee('Submit your project')
            ->assertSee('Name')
            ->assertSee('Describe the Project');
    }

    /** @test */
    public function user_can_submit_new_project()
    {
        $admin = $this->loginAsAdmin();

        $data = [
            'name' => 'Test Project',
            'description' => 'Test description',
            'opportunity_status_id' => 1,
            'review_status_id' => 1,
            'opportunity_start_at' => Carbon::now()->addDay(30),
            'opportunity_end_at' => Carbon::now()->addDay(45),
            'implementation_paths' => 'test solution',
            'sustainability_contribution' => 'deliverables',
            'affiliations' => [1, 2],
            'categories' => [1, 2],
            'keywords' => [1, 2],
            'city' => 'Tempe',
            'state' => 'AZ',
            'qualifications' => 'Qualifications',
            'responsibilities' => 'responsibilities',
            'learning_outcomes' => 'outcomes',
            'compensation' => 'compensation',
            'application_instructions' => 'Instructions',
        ];

        $response = $this
            ->actingAs($admin)
            ->post(route('frontend.opportunity.project.public.store'), $data);

        $response
            ->assertStatus(302);
        // ->assertRedirect(route('frontend.opportunity.project.index'))
        // ->assertSessionHas('message', 'Project successfully submitted');
    }
}
