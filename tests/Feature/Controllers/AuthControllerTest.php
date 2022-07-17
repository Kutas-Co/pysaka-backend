<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    /**
     * @test
     */
    public function user_can_get_access_token()
    {
        $user = User::factory()->create();

        $credentials = [
            'email' => $user->email,
            'password' => 'password',
        ];

        $this->postJson(route('access-tokens.create'), $credentials)
            ->assertSuccessful()
            ->assertJsonStructure(['access_token']);
    }

    /**
     * @test
     */
    public function user_can_destroy_access_token()
    {
        $user = User::factory()->create();
        $token = $user->createToken('access_token')->plainTextToken;
        $this->deleteJson(route('access-tokens.destroy'),[], [
            'Authorization' => "Bearer $token",
        ])->assertSuccessful();

    }
}
