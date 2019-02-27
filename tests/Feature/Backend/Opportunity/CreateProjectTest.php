<?php

namespace Tests\Feature\Backend\Opportunity;

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
    public function an_admin_can_access_the_create_project_page()
    {
        $admin = $this->loginAsAdmin();

        $this
            ->actingAs($admin)
            ->get(route('admin.opportunity.project.create'))
            ->assertStatus(200)
            ->assertSee('Project Management')
            ->assertSee('Post Project')
            ->assertSee('Name')
            ->assertSee('Description');
    }

    /** @test */
    public function admin_can_create_new_project()
    {
        $admin = $this->loginAsAdmin();

        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $data = [
            'name' => 'Test Project',
            'description' => 'Test description',
            'listing_start_at' => Carbon::yesterday(),
            'listing_end_at' => Carbon::tomorrow(),
            'application_deadline_at' => Carbon::tomorrow(),
            'application_deadline_text' => null,
            'opportunity_status_id' => 3,
            'review_status_id' => 3,
            'opportunity_start_at' => Carbon::tomorrow(),
            'opportunity_end_at' => Carbon::tomorrow(),
            'implementation_paths' => 'test solution',
            'sustainability_contribution' => 'deliverables',
            // 'affiliations' => [1, 2],
            // 'categories' => [1, 2],
            // 'keywords' => [1, 2],
            // 'addresses' => [
            //     'city' => 'Tempe',
            //     'state' => 'AZ',
            //     'country' => null,
            //     'comment' => null,
            // ],
            'qualifications' => 'Qualifications',
            'responsibilities' => 'responsibilities',
            'learning_outcomes' => 'outcomes',
            'compensation' => 'compensation',
            'budget_type_id' => 1,
            'budget_amount' => 'test amount',
            'application_instructions' => 'Instructions',
            'organization_id' => 5,
            'supervisor_user_id' => 1295,
            'program_lead' => 'Test',
            'success_story' => null,
            'library_collection' => null,
        ];

        $response = $this
            ->actingAs($admin)
            ->post(route('admin.opportunity.project.store'), $data);

        $response
            ->assertStatus(302)
            ->assertRedirect(route('admin.opportunity.project.index'))
            ->assertSessionHas('message', 'Project created successfully');

        Event::assertDispatched(ProjectCreated::class);
    }
}
