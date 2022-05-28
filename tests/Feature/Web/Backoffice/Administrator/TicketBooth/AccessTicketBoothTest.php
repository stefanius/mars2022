<?php

namespace Tests\Feature\Web\Administrator\Orders;

use Tests\Feature\Web\BackOffice\Administrator\AdministratorTestCase;

class AccessTicketBoothTest extends AdministratorTestCase
{
    /** @test */
    public function it_can_access_the_ticket_booth_order_searcher_as_an_administrator()
    {
        // Given

        // When
        $response = $this->get('http://backoffice.localhost/ticket-booth/order-searcher');

        // Then
        $response->assertStatus(200)
            ->assertSee('Search Order')
            ->assertSee('Sales')
            ->assertSee('Pre Order')
            ->assertSee('Medals')
            ->assertSee('Enter the ordernumber');
    }

        /** @test */
        public function it_can_access_the_ticket_booth_sales_as_an_administrator()
        {
            // Given

            // When
            $response = $this->get('http://backoffice.localhost/ticket-booth/sales');

            // Then
            $response->assertStatus(200)
                ->assertSee('Order')
                ->assertSee('First Name')
                ->assertSee('Last Name')
                ->assertSee('Email')
                ->assertSee('Total');
        }

        /** @test */
        public function it_can_access_the_ticket_booth_pre_order_as_an_administrator()
        {
            // Given

            // When
            $response = $this->get('http://backoffice.localhost/ticket-booth/pre-order');

            // Then
            $response->assertStatus(200)
                ->assertSee('Order')
                ->assertSee('First Name')
                ->assertSee('Last Name')
                ->assertSee('Email')
                ->assertSee('Total');
        }

        /** @test */
        public function it_can_access_the_ticket_booth_medals_as_an_administrator()
        {
            // Given

            // When
            $response = $this->get('http://backoffice.localhost/ticket-booth/medals');

            // Then
            $response->assertStatus(200)
                ->assertSee('Order')
                ->assertSee('First Name')
                ->assertSee('Last Name')
                ->assertSee('Email')
                ->assertSee('Total');
        }
}
