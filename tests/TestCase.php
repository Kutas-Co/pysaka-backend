<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Traits\WithAuthUser;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected User $user;

    /**
     * @param User|null $user
     * @return void
     */
    protected function withAuthUser(User $user = null): User
    {
        $this->user = $user ?? User::factory()->create();
        $this->actingAs($this->user);
        return $this->user;
    }

}
