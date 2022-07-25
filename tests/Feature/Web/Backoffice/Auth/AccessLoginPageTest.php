<?php

namespace Tests\Feature\Web\Backoffice\Auth;

use Tests\Feature\Web\Backoffice\BackofficeTestCase;

class AccessLoginPageTest extends BackofficeTestCase
{

    /** @test */
    public function it_can_access_the_login_page()
    {
        // Given

        // When
        $response = $this->get('http://backoffice.localhost/login');

        // Then
        $response->assertStatus(200)
            ->assertSee('Duinenmars Backoffice')
            ->assertSee('Your Email')
            ->assertSee('Your Password')
            ->assertSee('Login');
    }
}
