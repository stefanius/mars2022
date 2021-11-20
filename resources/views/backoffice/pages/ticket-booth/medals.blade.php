<x-layouts.backoffice>
    <x-slot name="menuBarLeft">
        <a class="navbar-item" href="{{ action('Backoffice\TicketBooth\TicketBoothController@sales') }}">
            <span>{{ __('Sales') }}</span>
        </a>

        <a class="navbar-item" href="{{ action('Backoffice\TicketBooth\TicketBoothController@preorder') }}">
            <span>{{ __('Pre Order') }}</span>
        </a>

        <a class="navbar-item is-active" href="{{ action('Backoffice\TicketBooth\TicketBoothController@medals') }}">
            <span>{{ __('Medals') }}</span>
        </a>
    </x-slot>

    <div class="p-5">
        <div class="column is-12">
            <livewire:table
                model="{{ \App\Models\Order::class }}"
                :queryOn="['order_number', 'first_name', 'last_name', 'email']"
                :scopes="['paid', 'started', 'notFinished', 'notPrinted', 'activeSeason']"
                routeKey="orders"
                :showCreateButton="false"
                :headers="[
                    'order_number' => ['title' => 'Order', 'width' => '10%', 'sortable' => true],
                    'first_name' => ['title' => 'First Name', 'width' => '25%', 'sortable' => true],
                    'last_name' => ['title' => 'Last Name', 'width' => '25%', 'sortable' => true],
                    'email' => ['title' => 'Email', 'sortable' => true],
                    'grand_total_currency' => ['title' => 'Total', 'align' => 'right', 'width' => '15%', 'sortable' => true],
                ]"
                :actions="['backoffice.pages.ticket-booth.actions.print']"
            />
        </div>
    </div>
</x-layouts.backoffice>
