<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_users_can_register()
    {
        $response = $this->post('/api/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

//        $this->assertAuthenticated();
        $response
            ->assertSuccessful()
            ->assertStatus(200)
            ->assertJsonStructure([
           'access_token', 'type'
        ]);
    }
}
