<x-layouts.backoffice>
    <div class="p-5">
        <div class="column is-12">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Orders') }}
                </h2>
            </x-slot>

            <livewire:table
                model="\App\Models\InventoryItem"
                :queryOn="['name', 'description']"
                routeKey="inventory"
                :headers="[
                'name' => ['title' => 'Item', 'sortable' => true],
                'obtained_at' => ['title' => 'Obtained At', 'width' => '20%', 'sortable' => true],
                'obsolete_at' => ['title' => 'Obsolete At', 'width' => '20%', 'sortable' => true],
                'amount' => ['title' => 'Amount', 'width' => '10%', 'sortable' => true],
            ]"/>
        </div>
    </div>
</x-layouts.backoffice>
