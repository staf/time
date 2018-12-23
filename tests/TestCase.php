<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @var User
     */
    protected $user;

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    protected function tearDown()
    {
        unset($this->user);

        parent::tearDown();
    }

    /**
     * @param  User|null $user
     * @return static
     */
    protected function signIn(User $user = null)
    {
        if (!$user) {
            $user = factory(User::class)->create();
        }

        return $this->actingAs($this->user = $user);
    }
}
