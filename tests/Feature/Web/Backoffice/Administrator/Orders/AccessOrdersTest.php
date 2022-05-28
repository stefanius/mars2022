<?php

namespace Tests\Feature\Web\Administrator\Orders;

use Tests\Feature\Web\BackOffice\Administrator\AdministratorTestCase;

class AccessOrdersTest extends AdministratorTestCase
{
    /** @test */
    public function it_can_access_the_orders_overview_as_an_administrator()
    {
        // Given

        // When
        $response = $this->get('http://backoffice.localhost/orders');

        // Then
        $response->assertStatus(200)
            ->assertSee('Orders')
            ->assertSee('Order')
            ->assertSee('First Name')
            ->assertSee('Last Name')
            ->assertSee('Email')
            ->assertSee('Total');
    }
}
