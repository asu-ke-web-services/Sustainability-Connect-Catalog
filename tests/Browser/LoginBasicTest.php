<?php

namespace Tests\Browser;

use SCCatalog\Models\Auth\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginBasicTest extends DuskTestCase
{
    /**
     * Test basic login form.
     *
     * @return void
     * @throws \Throwable
     */
    public function testBasicLogin()
    {
        $user = factory(User::class)->create([
            'email' => 'user@example.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login/basic')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/dashboard');
        });
    }
}
