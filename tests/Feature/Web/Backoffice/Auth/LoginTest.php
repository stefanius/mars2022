<?php

namespace Tests\Feature\Web\Backoffice\Auth;

use App\Models\User;
use Tests\Feature\Web\Backoffice\BackofficeTestCase;

class LoginTest extends BackofficeTestCase
{
    /** @test */
    public function it_can_login_a_user()
    {
        // Given
        User::factory()->create([
            'email' => 'herr-director@duinenmars.nl',
            'password' => 'TopSecret',
        ]);

        // When
        $response = $this->followingRedirects()->post('http://backoffice.localhost/login', [
            'email' => 'herr-director@duinenmars.nl',
            'password' => 'TopSecret',
        ]);

        // Then
        $response->assertStatus(200)
            ->assertSee('Log out')
            ->assertSee('Edition: ' . $this->season->edition);
    }

    /** @test */
    public function it_can_login_a_user_when_it_has_an_active_login_window()
    {
        // Given
        User::factory()->activeLoginWindow()->create([
            'email' => 'herr-active-director@duinenmars.nl',
            'password' => 'TopSecret',
        ]);

        // When
        $response = $this->followingRedirects()->post('http://backoffice.localhost/login', [
            'email' => 'herr-active-director@duinenmars.nl',
            'password' => 'TopSecret',
        ]);

        // Then
        $response->assertStatus(200)
            ->assertSee('Log out')
            ->assertSee('Edition: ' . $this->season->edition);
    }

    /** @test */
    public function it_cannot_login_when_the_user_is_unknown()
    {
        // Given

        // When
        $response = $this->followingRedirects()->post('http://backoffice.localhost/login', [
            'email' => 'non-existing@duinenmars.nl',
            'password' => 'TopSecret',
        ]);

        // Then
        $response->assertStatus(200)
            ->assertSee('Duinenmars Backoffice')
            ->assertSee('Your Email')
            ->assertSee('Your Password')
            ->assertSee('Login')
            ->assertDontSee('Log out')
            ->assertDontSee('Edition: ' . $this->season->edition);
    }

    /** @test */
    public function it_cannot_login_when_the_password_is_incorrect()
    {
        // Given
        User::factory()->create([
            'email' => 'herr-another-director@duinenmars.nl',
            'password' => 'TopSecret',
        ]);

        // When
        $response = $this->followingRedirects()->post('http://backoffice.localhost/login', [
            'email' => 'non-existing@duinenmars.nl',
            'password' => 'Whatever',
        ]);

        // Then
        $response->assertStatus(200)
            ->assertSee('Duinenmars Backoffice')
            ->assertSee('Your Email')
            ->assertSee('Your Password')
            ->assertSee('Login')
            ->assertDontSee('Log out')
            ->assertDontSee('Edition: ' . $this->season->edition);
    }

    /** @test */
    public function it_cannot_login_a_suspended_user()
    {
        // Given
        User::factory()->suspended()->create([
            'email' => 'herr-suspended-director@duinenmars.nl',
            'password' => 'TopSecret',
        ]);

        // When
        $response = $this->followingRedirects()->post('http://backoffice.localhost/login', [
            'email' => 'herr-suspended-director@duinenmars.nl',
            'password' => 'TopSecret',
        ]);

        // Then
        $response->assertStatus(200)
            ->assertSee('Duinenmars Backoffice')
            ->assertSee('Your Email')
            ->assertSee('Your Password')
            ->assertSee('Login')
            ->assertDontSee('Log out')
            ->assertDontSee('Edition: ' . $this->season->edition);
    }

    /** @test */
    public function it_cannot_login_a_user_when_its_login_window_is_expired()
    {
        // Given
        User::factory()->expiredLoginWindow()->create([
            'email' => 'herr-expired-director@duinenmars.nl',
            'password' => 'TopSecret',
        ]);

        // When
        $response = $this->followingRedirects()->post('http://backoffice.localhost/login', [
            'email' => 'herr-expired-director@duinenmars.nl',
            'password' => 'TopSecret',
        ]);

        // Then
        $response->assertStatus(200)
            ->assertSee('Duinenmars Backoffice')
            ->assertSee('Your Email')
            ->assertSee('Your Password')
            ->assertSee('Login')
            ->assertDontSee('Log out')
            ->assertDontSee('Edition: ' . $this->season->edition);
    }

    /** @test */
    public function it_cannot_login_a_user_when_its_login_window_is_in_the_future()
    {
        // Given
        User::factory()->futureLoginWindow()->create([
            'email' => 'herr-future-director@duinenmars.nl',
            'password' => 'TopSecret',
        ]);

        // When
        $response = $this->followingRedirects()->post('http://backoffice.localhost/login', [
            'email' => 'herr-future-director@duinenmars.nl',
            'password' => 'TopSecret',
        ]);

        // Then
        $response->assertStatus(200)
            ->assertSee('Duinenmars Backoffice')
            ->assertSee('Your Email')
            ->assertSee('Your Password')
            ->assertSee('Login')
            ->assertDontSee('Log out')
            ->assertDontSee('Edition: ' . $this->season->edition);
    }
}
