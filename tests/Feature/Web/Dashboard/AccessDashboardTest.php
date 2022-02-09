<?php

namespace Tests\Feature\Web\Dashboard;

use Tests\TestCase;

class AccessDashboardTest extends TestCase
{
    /** @test */
    public function it_can_access_the_dashboard()
    {
        // Given

        // When
        $response = $this->get('http://backoffice.localhost');

        // Then
        $response->assertStatus(200)
            ->assertSee('Started Hikers');
    }
}
