<?php

namespace Tests\Feature\Backend\User;

use Tests\TestCase;
use SCCatalog\Models\Auth\User;
use SCCatalog\Models\Lookup\UserType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_active_users_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/auth/user/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_admin_can_view_single_user_page()
    {

        $this->loginAsAdmin();
        factory(UserType::class)->create();
        $user = factory(User::class)->states('student')->create();

        $response = $this->get("/admin/auth/user/{$user->id}");

        $response->assertStatus(200);
    }
}
