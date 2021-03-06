<?php

namespace Tests\Feature\Web\Backoffice\Administrator\Dashboard;

use Tests\Feature\Web\Backoffice\Administrator\AdministratorTestCase;

class AccessDashboardTest extends AdministratorTestCase
{
    /** @test */
    public function it_can_access_the_dashboard_as_an_administrator()
    {
        // Given

        // When
        $response = $this->get('http://backoffice.localhost');

        // Then
        $response->assertStatus(200)
            ->assertSee('Started Hikers');
    }
}
