<x-layouts.backoffice>
    <div class="p-5">
        <div class="column is-12">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Addresses') }}
                </h2>
            </x-slot>

            <livewire:table
                model="\App\Models\Address"
                :queryOn="['name', 'postal_code', 'city']"
                routeKey="addresses"
                :headers="[
                'type' => ['title' => 'Type', 'width' => '6%', 'sortable' => false],
                'name' => ['title' => 'Name', 'sortable' => true],
                'street_address' => ['title' => 'Address', 'width' => '25%', 'sortable' => true],
                'postal_code' => ['title' => 'Postal Code', 'width' => '15%', 'sortable' => true],
                'city' => ['title' => 'City', 'width' => '30%', 'sortable' => true],
            ]"/>
        </div>
    </div>
</x-layouts.backoffice>
