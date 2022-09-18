<?php

namespace Tests\Feature\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SocialiteAuthControllerTest extends TestCase
{
    /**
     * @test
     * @testWith  ["google"]
     */
    public function guest_can_get_redirect_link_for_particular_provider($providerName)
    {
        $this->getJson(route('socialite.redirect', ['driver' => 'google']))
            ->assertSuccessful()
            ->assertJsonStructure(['url']);
    }
}
