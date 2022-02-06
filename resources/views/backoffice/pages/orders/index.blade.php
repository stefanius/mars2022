<x-layouts.backoffice>
    <div class="p-5">
        <div class="column is-12">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Orders') }}
                </h2>
            </x-slot>

            <livewire:table
                model="\App\Models\Order"
                :queryOn="['order_number', 'first_name', 'last_name', 'email']"
                routeKey="orders"
                :showCreateButton="false"
                :headers="[
                'order_number' => ['title' => 'Order', 'width' => '10%', 'sortable' => true],
                'first_name' => ['title' => 'First Name', 'width' => '30%', 'sortable' => true],
                'last_name' => ['title' => 'Last Name', 'width' => '30%', 'sortable' => true],
                'email' => ['title' => 'Email', 'sortable' => true],
                'grand_total_currency' => ['title' => 'Total', 'width' => '20%', 'sortable' => true],
            ]"/>
        </div>
    </div>
</x-layouts.backoffice>
