<?php

namespace Tests\Feature\Web\Backoffice;

use Tests\TestCase;
use App\Models\User;

abstract class BackofficeTestCase extends TestCase
{
    /**
     * @var \App\Models\User
     */
    protected $user;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    /**
     * Login as administrator.
     *
     * @return void
     */
    protected function loginAsAdministrator()
    {
        $this->user = User::factory()->admin()->create();

        $this->actingAs($this->user);
    }

    /**
     * Login as user.
     *
     * @return void
     */
    protected function loginAsUser()
    {
        $this->user = User::factory()->create();

        $this->actingAs($this->user);
    }
}
